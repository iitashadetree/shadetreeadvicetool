<?php
require "../config/connection.php"; // Your Database details 
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
.item2 { grid-area: main; width:100%; height:auto;}
.item3 { grid-area: footer; height:30px;}

.grid-container {
  display: grid;
  grid-template-areas:
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

</head>

<body style="background-image: url('images/Tree_background.jpg');">

<div class="grid-container">
 <div class="item1" style="color:white; background-color:#E87F34"><a href="../index.php" style="color:white; text-decoration:none; font-size: 20px; font-weight: bold">Shade Tree Advice Tool</a></div>
  <div class="item2">	
	<a href= "../index.php" ><img src="images/gobck.png" style="padding-right:300px;"></a>
          	<?php   include ("form_selectorTWO.php");  ?>				
	</div>
	
	<div class="item3" style="color:white; background-color:#E87F34;>
	<a href="http://www.ccafs.in/" target="_blank"><img src="images/CCAFS.png" alt="CCAFS Logo" height="30"/></a>
	<a href="http://iita.org/" target="_blank"><img src="images/IITA_logo.png" alt="IITA Logo" height="30" /></a>
	<a href="http://metajua.com/"  target="_blank"><img src="images/Metajua.png" alt="Metajua Logo" height="30"/></a>
	<a href="http://www.worldagroforestry.org/" target="_blank"><img src="images/ICRAF.png" alt="ICRAF Logo" height="30" /></a>
	<a href="http://foreststreesagroforestry.org/ "target="_blank"><img src="images/FTA.png" alt="FTA Logo" height="30"/></a>
	<a href="admin/login.php" target="_blank"><img src="images/icon_admin.png" alt="IITA admin Logo" height="30" /></a>
	</div>
  </div>  

<script>  
function validateform(){  
var country=document.f1.country.value;  
var region=document.f1.region.value;  
  
if (country=="" || region==""){  
  alert("Name can't be blank");  
  return false;  
}  
}  
</script> 

<!--<script src="../js../main.js"></script>-->
</body>
</html>