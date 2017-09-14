<?php
//Pressed login
if(isset($_POST['login'])) {

    //Define empty message vars
    $boxMsg = '';
    $boxMsgClass = '';

    //Set field vars
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if(empty($username) || empty($password)) {
        //Failed
        $boxMsg = 'Please fill in all fields!';
        $boxMsgClass = "alert-danger";
        exit;
    }
    //No need for else block becuase if check fails the script gets exited.
    //Therefore this code is safe to input
    
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="http://bootswatch.com/cosmo/bootstrap.css">
        <title>Login</title>
    </head>

    <body>
        <div class="container">
            <?php if($boxMsg != ''): ?>
                <div class="alert <?php echo $boxMsgClass; ?>"><?php echo $boxMsg; ?></div>
            <?php endif; ?>
            <legend>Login</legend>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-horizontal">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $username; ?>" />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $password; ?>">
                </div>
                <div class="form-group">
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                    <a name="home" class="btn btn-default" href="<?php echo ROOT_URL; ?>">Home</a>
                </div>
            </form>
        </div>
    </body>
</html>
