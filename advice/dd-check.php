<?php

require "../config/connection.php"; // Your Database details 



$country=$_POST['country'];
$region=$POST['region'];
$crop=$POST['crop'];
$subgroup=$POST['subgroup'];
/*

echo "<br/>".$country."<br/>";
echo "<br/>".$region."<br/>";
echo "<br/>".$crop."<br/>";
echo "<br/>".$subgroup."<br/>";
        
*/
//$form1=$POST['form1'];

 if(isset($POST['form1'])) {  
     
  if (($POST['country'] == '--Country--') || ($POST['region'] == '--Region--') || ($POST['crop'] == '--Crop--') || ($POST['subgroup'] == '--Subgroup--')) {
                                 
  ?>                         
  
  <?php
//require "../config/connection.php"; // Your D1atabase details 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
  
<!--
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


</head>
<body>
<!--start-home
  <div class="headerCotent" style="height:62px;bckground:red;z-index:99999;position:absolute;padding:5px;">
        <div id="headerContainer">
                    <a href=../index.php><img src="images/logo_white.png" alt="Shade Tool Logo" height="52" width="64"/>
                    <span class="headerTitle" style="width:100%;min-width:680px;height:auto;">Shade tree advice tool</span></a>
        </div>
</div>

       <div class="container" <div class="container" style="z-index:999999999;background:url(images/cont_bg.png); margin-top: 40px;min-height:380px;width:48%;min-width:875px;margin: auto;  position: absolute;  top: 15%; bottom:15%;left: 0; right: 0;">                     
                        <div class="leftContent"><a href="javascript:history.go(-1)" title="Return to the previous page"><i class="fa fa-angle-left" style="float:left;top: -4px;left: -120px;"></i></a></div>
                  <!--     <div class="middleContent" style="margin-top: 78px;"><?php  // include ("form_selectorValidate.php");  ?></div> -->
                  <!--      <div class="rightContent" style="position: absolute;top: 22px;left: 803px;"><img src='images/icon_tool.png' height='52' width='52' style='margin-right: 20px;' /></div>
              </div>
</div>  

-->
</body>
</html> 
  
   <?php
  }
                            else{    


?>

<!DOCTYPE HTML>
<html>
<head>
<title>Shade tree advice</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="image/favicon2.ico">
<script type="applijegleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<style>
body { height:100%; margin-top:5px; margin-bottom:15px;}
.item1 { grid-area: header; height:auto;}
.itemA { grid-area: header; height:auto;background-color:white; padding:10px; font-size:16px; 
 font-family: Verdana, Trebuchet MS,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Tahoma,sans-serif;
 margin-bottom:15px;}
.item2 { grid-area: main; width:100%; height:auto;}
.item3 { grid-area: footer; height:30px;}

.grid-container {
  display: grid;
  grid-template-areas:
    'header header header header header header'
	'header header header header header header'
    'main main main main main main'
    'footer footer footer footer footer footer';
  grid-gap: 10px; 
  padding: 5px;
  text-align: center;
  
 
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  padding: 20px 0;
  font-size: 30px;
}

</style>
<?php  include '../contact/feedbacklinks2.php'; ?>
</head>
<body style="background-image: url('images/Tree_background.jpg');">

<div class="grid-container">
 <div class="item1" style="color:white; background-color:#E87F34"><a href="../index.php" style="color:white; text-decoration:none; font-size: 20px; font-weight: bold">Shade Tree Advice Tool</a></div>
  <div class="item2">	
       <div class="itemA" style=" line-height:1.2em;"> 
	<span><h4> <?php echo $country.' > '.$region.' > '.$crop.' > '.$subgroup.''; ?></h4></span>  
		<span style="color:#E87F34;">Select <b>Attributes</b> and <b>Weights</b> respectively</span>
		</div>
		<a href= "./tool.php" ><img src="images/gobck.png" style="padding-right:300px;"></a>
	<?php   include ("form_selector22.php");  ?>
	
	</div>
	
	<div class="item3" style="color:white; background-color:#E87F34; margin-top:5px">
	<a href="http://www.ccafs.in/" target="_blank"><img src="images/CCAFS.png" alt="CCAFS Logo" height="30"/></a>
	<a href="http://iita.org/" target="_blank"><img src="images/IITA_logo.png" alt="IITA Logo" height="30" /></a>
	<a href="http://metajua.com/"  target="_blank"><img src="images/Metajua.png" alt="Metajua Logo" height="30"/></a>
	<a href="http://www.worldagroforestry.org/" target="_blank"><img src="images/ICRAF.png" alt="ICRAF Logo" height="30" /></a>
	<a href="http://foreststreesagroforestry.org/ "target="_blank"><img src="images/FTA.png" alt="FTA Logo" height="30"/></a>
	<a href="admin/login.php" tarPOST="_blank"><img src="images/icon_admin.png" alt="IITA admin Logo" height="30" /></a>
	</div>
  </div>  

<!--<script src="js/main.js"></script> -->
</body>
</html>
<?php
                            }
} else {
	 header ("Location: dd-check.php");
}
?>