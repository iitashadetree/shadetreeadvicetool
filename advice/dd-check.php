<?php

require "../config/connection.php"; // Your Database details 



$country=$_POST['country'];
$region=$_POST['region'];
$crop=$_POST['crop'];
$subgroup=$_POST['subgroup'];
/*

echo "<br/>".$country."<br/>";
echo "<br/>".$region."<br/>";
echo "<br/>".$crop."<br/>";
echo "<br/>".$subgroup."<br/>";
        
*/
//$form1=$_POST['form1'];

 if(isset($_POST['form1'])) {  
     
  if (($_POST['country'] == '--Country--') || ($_POST['region'] == '--Region--') || ($_POST['crop'] == '--Crop--') || ($_POST['subgroup'] == '--Subgroup--')) {
                                 
  ?>                         
  
  <?php
require "../config/connection.php"; // Your Database details 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
  

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

<title>Shade tree advice</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="../image/favicon2.ico">
<script type="applijegleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />  
<link rel="stylesheet" type="text/css" media="all" href="css/style1.css" />
<link rel="stylesheet" href="css/font-awesome.min.css">

<?php include '../contact/feedbacklinks2.php'; ?>
</head>
<body>
<!--start-home-->
  <div class="headerCotent" style="height:62px;bckground:red;z-index:99999;position:absolute;padding:5px;">
        <div id="headerContainer">
                    <a href=../index.php><img src="images/logo_white.png" alt="Shade Tool Logo" height="52" width="64"/>
                    <span class="headerTitle" style="width:100%;min-width:680px;height:auto;">Shade tree advice tool</span></a>
        </div>
</div>

       <div class="container" <div class="container" style="z-index:999999999;background:url(images/cont_bg.png); margin-top: 40px;min-height:380px;width:48%;min-width:875px;margin: auto;  position: absolute;  top: 15%; bottom:15%;left: 0; right: 0;">                     
                        <div class="leftContent"><a href="javascript:history.go(-1)" title="Return to the previous page"><i class="fa fa-angle-left" style="float:left;top: -4px;left: -120px;"></i></a></div>
                        <div class="middleContent" style="margin-top: 78px;"><?php   include ("form_selectorValidate.php");  ?></div>
                        <div class="rightContent" style="position: absolute;top: 22px;left: 803px;"><img src='images/icon_tool.png' height='52' width='52' style='margin-right: 20px;' /></div>
              </div>
</div>  
<?php include '../contact/feedback.php'; ?>
<?php include 'footer.php'; ?>

</body>
</html>
  
   <?php
  }
                            else{    


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Shade tree advice</title>

		<SCRIPT language=JavaScript>
		function reload(form)
		{
		var val=form.cat.options[form.cat.options.selectedIndex].value;

		self.location='dd-check.php?cat=' + val ;
		}

		</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="../image/favicon2.ico">
<script type="applijegleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />  
<link rel="stylesheet" type="text/css" media="all" href="css/style1.css" />
<link rel="stylesheet" href="css/font-awesome.min.css">

<?php include '../contact/feedbacklinks2.php'; ?>
</head>
<body>
<!--start-home-->
  <div class="headerCotent" style="height:62px;bckground:red;z-index:99999;position:absolute;padding:5px;">
        <div id="headerContainer">
                    <a href=../index.php><img src="images/logo_white.png" alt="Shade Tool Logo" height="52" width="64"/>
                    <span class="headerTitle" style="width:100%;min-width:680px;height:auto;">Shade tree advice tool</span></a>
        </div>
</div>

       <div class="container" <div class="container" style="z-index:999999999;background:url(images/cont_bg.png); margin-top: 40px;min-height:460px;width:48%;min-width:875px;margin: auto;  position: absolute;  top: 15%; bottom:15%;left: 0; right: 0;">            
                            <h3><span style="position: relative;top:15px;left: 95px;" > <?php echo $country.' > '.$region.' > '.$crop.' > '.$subgroup.'<p></p>'; ?></span></h3>                    
                                                    
                        <div class="leftContent"><a href="javascript:history.go(-1)" title="Return to the previous page"><i class="fa fa-angle-left" style="float:left;top: -51px;left: -120px;"></i></a></div>
                        <div class="middleContent" style="margin-top: 78px;width: 52%;">
                          
                          <form method="post" action="result.php" id="attribute" name="attribute">
                          <fieldset style="min-height: 307px;width:100%;">
                          <?php   include ("form_selector2.php");  ?></div>
                        <div class="rightContent" style="position: relative;top: -28px;left:172px;"><img src='images/icon_tool.png' height='52' width='52' style='margin-right: 20px;' /></div>
              </div>
</div>  
<?php include '../contact/feedback.php'; ?>

<?php include 'footer.php'; ?>

</body>
</html>
<?php
                            }
} else {
	 header ("Location: tool.php");
}
?>