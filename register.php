<?php
    //Requires PHPMailer
    require("class.phpmailer.php");
    //Pressed register
    if(isset($_POST['register'])) {

        //Define empty message vars
        $boxMsg = '';
        $boxMsgClass = '';

        //Set field vars
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $email = htmlspecialchars($_POST['email']);

        //Check fields empty
        if(empty($username) || empty($password) || empty($email)) {
            //Failed
            $boxMsg = 'Please fill in all fields!';
            $boxMsgClass = "alert-danger";
            exit;
        }
        //Passed
        //MySQL connect
        require("inc/database.php");

        $query = "SELECT * FROM userst WHERE username = $username";
        $result = mysqli_query($conn, $query);

        //Check if username is taken
        if (mysqli_num_rows($result) > 0) {

            mysqli_close($conn);
            $boxMsg = "That username is taken!";
            $boxMsgClass = "alert-danger";
            exit;

        }

        $query = "INSERT INTO userst(username,password,email) VALUES($username,$password,$email)";

        if(!mysqli_query($conn, $query)) {

            mysqli_close($conn);
            $boxMsg = "Failed to connect, please try again later.";
            exit;

        }
        $boxMsg = "Success! Email has been sent to the spedified address.\n
        Please check your spam or junk folder as it may appear there.";
        $boxMsgClass = "alert-success";

        //Send email
        $emailBody = <<<EOT
            <!doctype html>

            <html>
                <head>
                    <link rel="stylesheet" href="http://bootswatch.com/cosmo/bootstrap.css">
                </head>
                <body>
                    <div class="container">
                        <div class="jumbotron">
                            <h1>You have requested to register to andrewboy159.orgfree.com!</h1>
                            <h2>You have requested the username: "<?php echo $username; ?>"</h2>
                            <p>If this is not you, do not click the link below, and you will
                            <br>be safe as long as your email login info is secure.</p>
                            <p>If this is you, click the link below to register to our community coding tutorials and forums site!</p>
                            <p>Link: <a href="andrewboy159.orgfree.com/registered.php">andrewboy159.orgfree.com/registered.php</a></p>
                        </div>
                    </div>
                </body>
            </html>
EOT;

        $mail = new PHPMailer;

        $mail->setFrom('noreply@andrewboy159.orgfree.com', 'Mailer');

        if(!$mail->ValidateAddress($email)) {
            $boxMsg = "Invalid Email Adress!";
            $boxMsgClass = "alert-danger";
            exit;
        }

        $mail->addAddress($email);     // Add a recipient
        $mail->addReplyTo('info@example.com', 'Information');

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Registration';
        $mail->Body = $emailBody;

        if(!$mail->send()) {
            $boxMsg = "Failed to send email, please try again later.";
            $boxMsgClass = "alert-danger";
            exit;
        }
    }

?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href='http://bootswatch.com/cosmo/bootstrap.css'>
        <title>Home</title>
    </head>

    <body>
        <div class="container">
            <?php if($boxMsg != ''): ?>
                <div class="alert <?php echo $boxMsgClass; ?>"><?php echo $boxMsg; ?></div>
            <?php endif; ?>
            <legend>Register</legend>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-horizontal">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $username; ?>" />
                    <span class="help-block">Max. 20 Characters</span>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $password; ?>">
                    <span class="help-block">Min. 8 Characters</span>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>">
                    <span class="help-block">Ex. example@exemple.com</span>
                </div>
                <div class="form-group">
                    <button type="submit" name="register" class="btn btn-primary">Register</button>
                    <a name="back" class="btn btn-default" href="<?php echo ROOT_URL; ?>">Back</a>
                </div>
            </form>
        </div>
    </body>
</html>
