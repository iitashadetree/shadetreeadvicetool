<!DOCTYPE html>
<html lang="en">
<head>
  <title>Open SME Profile User registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/form-templates.css">
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
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="top_panel">
            <h3>Admin dashboard to send email notifications</h3>            
        </div>
      </div>

    <div class="col-sm-12">
        <div id="message"></div>
    </div>

    <div class="form-body">
        <form role="form" action="send_mail.php" method="post" class="login-form">
          <div class="row centreform">
            <div class="col-sm-1"></div>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control admin_field" id="inputdefault" name="email_address" type="text" placeholder="Enter E-mail">
              </div>
            </div>

            <div class="col-sm-4">
              <div>
                <input type="submit" name="send" class="btn btn-primary" value="Submit" />
              </div>
            </div> 
          </div> 
        </form>
    </div>
  </div>  
</div>
</body>
</html>

