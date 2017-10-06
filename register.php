<?php

// (!) REMEMBER TO PLACE THIS BEFORE EVERYTHING (!)
error_reporting(E_ALL);
ini_set("display_errors", 1);

// (!) USE REQUIRE FOR REQUIRED PAGES, REMEMBER TO PLACE THIS BEFORE ANY CHECKS ARE MADE (!)
require("inc/header.php");
require("inc/database.php");
require("class.phpmailer.php");

// (!) REMEMBER THAT $_POST IS ALWAYS SET, CHECK AGAINST EMPTY INSTEAD (!)
if($_POST) {
    if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
        $boxMsg = "Please fill in all fields!";
        $boxMsgClass = "alert-danger";
    } else {
		// (!) REMEMBER TO ESCAPE AND CLEAN ALL USER INPUT (!)
		$username = stripslashes($_POST['username']); $username = mysqli_real_escape_string($conn,$username);
		$usernameLower = strtolower($username);
		$password = stripslashes($_POST['password']); $password = mysqli_real_escape_string($conn,$password);
		$email = stripslashes($_POST['email']); $email = mysqli_real_escape_string($conn,$email);
		$emailLower = strtolower($email);

		$query = "SELECT * FROM `userst` WHERE username='$usernameLower'"; $result = mysqli_query($conn,$query);

		if(mysqli_num_rows($result) > 0) {
			$boxMsg = "Username taken!";
			$boxMsgClass = "alert-danger";
			$unMsgClass = 'text-danger';
			$unBoxClass = 'has-error';
		} elseif(strlen($username) > 20) {
			$boxMsg = 'Username too long!';
			$boxMsgClass = 'alert-danger';
			$unMsgClass = 'text-danger';
			$unBoxClass = 'has-error';
		} elseif(strlen($username) < 3) {
			$boxMsg = 'Username too short!';
			$boxMsgClass = 'alert-danger';
			$unMsgClass = 'text-danger';
			$unBoxClass = 'has-error';
		} elseif(preg_match('/[^A-Za-z0-9]/', $usernameLower)) {
			$boxMsg = 'Username cannot contain symbols!';
			$boxMsgClass = 'alert-danger';
			$unMsgClass = 'text-danger';
			$unBoxClass = 'has-error';
		} elseif (strpos($username, ' ') !== false) {
			$boxMsg = 'Username must not contain spaces!';
			$boxMsgClass = 'alert-danger';
			$unMsgClass = 'text-danger';
			$unBoxClass = 'has-error';
		} else {

			if(strlen($password) < 8 ) {
				$boxMsg = 'Password too short!';
				$boxMsgClass = 'alert-danger';
				$pwMsgClass = 'text-danger';
				$pwBoxClass = 'has-error';
			} elseif (!preg_match('/[A-Za-z]/',$password)) {
				$boxMsg = 'Password must contain one letter!';
				$boxMsgClass = 'alert-danger';
				$pwMsgClass = 'text-danger';
				$pwBoxClass = 'has-error';
			} elseif (!preg_match('/\d/',$password)) {
				$boxMsg = 'Password must contain one number!';
				$boxMsgClass = 'alert-danger';
				$pwMsgClass = 'text-danger';
				$pwBoxClass = 'has-error';
			} elseif (strpos($password, ' ') !== false) {
				$boxMsg = 'Password must not contain spaces!!';
				$boxMsgClass = 'alert-danger';
				$pwMsgClass = 'text-danger';
				$pwBoxClass = 'has-error';
			} else {

				$query = "SELECT * FROM `userst` WHERE email='$emailLower'"; $result = mysqli_query($conn,$query);

				if(mysqli_num_rows($result) > 0) {
					$boxMsg = "Email taken!";
					$boxMsgClass = "alert-danger";
					$emMsgClass = 'text-danger';
					$emBoxClass = 'has-error';
				} else {
					$query = "INSERT INTO `userst` (username, password, email) VALUES ('$username','$password','$email')"; $result = mysqli_query($conn,$query);

					$code = md5(uniqid(rand()));

					// (!) YOU STILL HAVE TO MAKE THIS A STRING (!)
					$emailBody = '<<<EOT
						<!DOCTYPE html>

						<html>
							<body style="font-family: Lucida Sans Unicode; text-decoration: none;">
								<div style="text-align: center; color: #002BFF; margin: auto; background-color: #D4D4D4; padding: 6px; width: 65%; border-style: solid; border-color: #8B8B8B;">
									<h1>You have requested to register to Code Maniac!</h1>
									<h2>You have requested the username: '.$username.'</h2>
									<h4 style="color: black;"><p>If this is not you, do not click the link below, and you will
									<br>be safe as long as your email login info is secure.</p></h4>
									<h4 style="color: black;"><p>If this is you, click the link below to register to our community coding tutorials and forums site!</p></h4>
									<h4 style="color: black;"><p>Link: <a style="color: #002BFF; text-decoration: none;" href="http://www.codemaniac.tk/registered.php">http://www.codemaniac.tk/registered.php?code=$code</a></p></h4>
								</div>
							</body>
						</html>EOT;';

					$mail = new PHPMailer;
					$mail->setFrom('noreply@codemaniac.tk', 'Code Manic');

					if(!$mail->ValidateAddress($email)) {
						$boxMsg = "Invalid Email Adress!";
						$boxMsgClass = "alert-danger";
					} else {
						$mail->addAddress($email);
						$mail->isHTML(true);
						$mail->Subject = 'Registration';
						$mail->Body = $emailBody;
						if(!$mail->send()) {
							$boxMsg = "Failed to send email, please try again later.";
							$boxMsgClass = "alert-danger";
						} else {
							$boxMsg = "Success! Email has been sent to the spedified address.\nPlease check your spam or junk folder as it may appear there.";
							$boxMsgClass = "alert-success";
							$_SESSION["username"] = $username;
							$_SESSION["password"] = $password;
						}
					}
				}
			}
		}
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
            <?php if(isset($boxMsg)): ?>
                <div class="text-center alert <?php echo $boxMsgClass; ?>"><?php echo $boxMsg; ?></div>
            <?php endif; ?>
            <legend>Register</legend>
            <form action="" method="post" class="form-horizontal">
				<?php
					if(isset($unMsgClass)){
						echo "<div class='form-group $unBoxClass'>";
					} else {
						echo "<div class='form-group'>";
					}
				 ?>
                    <label class="control-label" for="usernamebox">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" id="usernamebox" />
					<?php if(isset($unMsgClass)): ?>
						<span class="<?php echo $unMsgClass; ?>"></span>
					<?php endif; ?>
                    <span class="help-block">Max. 20 Characters</span>
                    <span class="help-block">Min. 3 Characters</span>
                    <span class="help-block">No Symbols (!@#$%^&*)</span>
                    <span class="help-block">No Spaces</span>
                </div>
				<?php
					if(isset($pwMsgClass)){
						echo "<div class='form-group $pwBoxClass'>";
					} else {
						echo "<div class='form-group'>";
					}
				 ?>
	                <label class="control-label" for="passwordbox">Password</label>
	                <input type="password" name="password" class="form-control" placeholder="Password" id="passwordbox" />
					<?php if(isset($pwMsgClass)): ?>
						<span class="<?php echo $pwMsgClass; ?>"></span>
					<?php endif; ?>
					<span class="help-block">Min. 8 Characters</span>
	                <span class="help-block">Must contain at least 1 letter & 1 number</span>
	                <span class="help-block">To make password stronger include symbols (!@#$%^&*)</span>
	                <span class="help-block">No Spaces</span>
                </div>
				<?php
					if(isset($emMsgClass)){
						echo "<div class='form-group $emBoxClass'>";
					} else {
						echo "<div class='form-group'>";
					}
				 ?>
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email" id="emailbox"/>
					<?php if(isset($emMsgClass)): ?>
						<span class="<?php echo $emMsgClass; ?>"></span>
					<?php endif; ?>
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
