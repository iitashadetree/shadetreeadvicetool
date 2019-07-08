<?php

require "../config/connection.php"; // Your Database details 
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Shade tree advice</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="../image/favicon2.ico">
<script type="applijegleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" media="all" href="css/style1.css" />
<link rel="stylesheet" href="css/font-awesome.min.css">

<?php include '../contact/feedbacklinks2.php'; ?>
</head>
<body>
<!--start-home and first Upload to gitHub 08-07-2019-->
  <div class="headerCotent" style="height:62px;bckground:red;z-index:99999;position:absolute;padding:5px;">
        <div id="headerContainer">
                    <a href='../index.php'><img src="images/logo_white.png" alt="Shade Tool Logo" height="52" width="64"/>
                    <span class="headerTitle" style="width:100%;min-width:680px;height:auto;">Shade tree advice tool</span></a>
        </div>
</div>

			 <div class="container" style="z-index:999999999;background:url(images/cont_bg.png); margin-top: 40px;min-height:380px;width:48%;min-width:875px;margin: auto;  position: absolute;  top: 15%; bottom:15%;left: 0; right: 0;">			        	
						<div class="leftContent"><a href= "../index.php" ><i class="fa fa-angle-left" style="float:left;top: -4px;left: -120px;brder:1px solid red;"></i></a></div>
          	<div class="middleContent" ><?php   include ("form_selector.php");  ?></div>
						<div class="rightContent" style="position: absolute;top: 22px;left: 803px;"><img src='images/icon_tool.png' height='52' width='52' style='margin-right: 20px;' /></div>
	          </div>
</div>	

<?php include '../contact/feedback.php'; ?>

<?php include 'footer.php'; ?>



<SCRIPT language=JavaScript>
function reload(form)
{
var val=form.country.options[form.country.options.selectedIndex].value; 
self.location='tool.php?country=' + val ;
}
function reload3(form)
{
var val=form.country.options[form.country.options.selectedIndex].value; 
var val2=form.region.options[form.region.options.selectedIndex].value; 

self.location='tool.php?country=' + val + '&region=' + val2 ;
}

function reload4(form)
{
var val=form.country.options[form.country.options.selectedIndex].value; 
var val2=form.region.options[form.region.options.selectedIndex].value; 
var val3=form.crop.options[form.crop.options.selectedIndex].value; 

self.location='tool.php?country=' + val + '&region=' + val2 + '&crop=' + val3 ;
}
</script>
</body>
</html>