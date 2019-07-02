<!DOCTYPE html>
<html lang="en">
<head>
  <title>Open SME Profile User registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <script type="text/javascript">
$(document).ready(function () {
$('#success').click(function (e) {
  e.preventDefault()
  $('#message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">×</button>Your message renders here</div>');
})
});
</script>
</head>
<body>
    <p>Register a user here</p>            
    <div class="col-sm-12">
        <div id="message"></div>
    </div>
        <form role="form" action="send_mail.php" method="post" class="login-form">
              <input class="form-control admin_field" id="inputdefault" name="email_address" type="text" placeholder="Enter E-mail">
              <input type="submit" name="send" class="btn btn-primary" value="Submit" />
        </form>
</body>
</html>

