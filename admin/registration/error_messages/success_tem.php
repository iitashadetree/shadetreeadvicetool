<!DOCTYPE html>
<html lang="en">
<head>
  <title>OpenSMEProfile User registration Information</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="../bootstrap/js/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/form-templates.css">
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
  <div class="container" style="border:1px solid aqua;">
    <div class="row">
      <div class="col-sm-12">
        <div class="top_panel">
            <h3>Message:</h3>            
        </div>
      </div>

    <div class="form-body">
        <p>Information has been saved - You will recieve an approval confirmation email later.</p>
    </div>
  </div>  
</div>
</body>
</html>

