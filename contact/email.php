<?php
    include("../inc/header.php");
    require("../class.phpmailer.php");

    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $body = htmlspecialchars($_POST['body']);

    if(!isset($_POST['email']) || !isset($_POST['subject']) || !isset($_POST['body'])) {
      echo 'Error: Fill in all fields';
    }

    $emailBody = '<<<EOT
						<!DOCTYPE html>

						<html>
							<body style="font-family: Verdana; text-decoration: none;">
								<div style="text-align: center; color: #002BFF; margin: auto; background-color: #D4D4D4; padding: 6px; width: 65%; border-style: solid; border-color: #8B8B8B;">
									<h1>Code Maniac</h1>
                  <br><br>
                  <h3>You have submitted a suport ticket to out support team!</h3>
								</div>
							</body>
						</html>EOT;';

					$mail = new PHPMailer;
					$mail->setFrom('support@codemaniac.tk', 'Code Maniac Support');

					if(!$mail->ValidateAddress($email)) {
						echo 'Error: Invalid Email Address';
					} else {
						$mail->addAddress($email);
						$mail->isHTML(true);
						$mail->Subject = 'Registration';
						$mail->Body = $emailBody;
						if(!$mail->send()) {
							echo 'Error: Failed to send';
						} else {
							echo 'Success! You have sent a support ticket! Check your inbox shortly!';
						}
          }

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://bootswatch.com/cosmo/bootstrap.css">
    <title>Email Support</title>
  </head>
  <style media="screen">
    p {
      font-size: 40px;
    }
  </style>
  <body>
    <div class="container">
      <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>"method="post">
        <fieldset>
          <legend>Support Ticket</legend>
          <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="example@example.com" value="<?php echo $email; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputSubject" class="col-lg-2 control-label">Subject</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="inputEmail" id="inputSubject" placeholder="Brief description">
            </div>
          </div>
          <div class="form-group">
            <label for="inputBody" class="col-lg-2 control-label">Issue</label>
            <div class="col-lg-10">
              <textarea class="form-control" rows="5" id="inputBody" placeholder="Why are you contacting us?"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              <button type="reset" class="btn btn-default" name="cancel">Cancel</button>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </body>
</html>

<?php
	include("../inc/footer.html");
?>
