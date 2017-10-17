<?php
    include("inc/header.php");

    $boxMsg = '';
    $boxMsgClass = '';

    if(empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['body'])) {
      $boxMsg = 'Please fill in all fields!';
      $boxMsgClass = "alert-danger";
      exit;
    }

    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $body = htmlspecialchars($_POST['body']);


?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://bootswatch.com/cosmo/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <title>Email Support</title>
  </head>
  <style media="screen">
    p {
      font-size: 40px;
    }
  </style>
  <body>
    <div class="container">
      <form class="form-horizontal" method="post">
        <fieldset>
          <legend>Support Ticket</legend>
          <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="example@example.com">
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
	include("inc/footer.html");
?>
