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

  <link rel="stylesheet" type="text/css" href="css/country.css" />
  <link rel="stylesheet" type="text/css" href="css/component.css" />
  <link rel="stylesheet" type="text/css" href="css/content.css" />
  <script src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/pagination_country.js"></script>
  <script src="js/modernizr.custom.js"></script>
  
  <!--webfonts-->
<link rel="stylesheet" href="css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" media="all" href="css/styles.css"> 

<style>
body { height:100%; margin-top:15px; margin-bottom:15px;}
.item1 { grid-area: header; height:auto;}
.itemA { grid-area: header; height:auto; background-color:white; padding:10px; font-size:16px; text-align:center;}
.item2 { grid-area: main; width:100%; height:auto;}
.item3 { grid-area: footer; height:65px;}

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

</head>

<body style="background-image: url('images/Tree_background.jpg');">

<div class="grid-container">
	<div class="item1" style="color:white; background-color:#E87F34">
<a href="../index.php" style="color:white; text-decoration:none; font-size: 20px; font-weight: bold">Shade Tree Advice Tool</a>
</div>
 
	<div class="item2">	

	                   
            
            <div  style=" margin:auto; height: auto; width:100%;">

                      
                              
                              <form id="formSearch">
							  <a href= "../index.php" ><img src="images/gobck.png" title = "Go back to home" style="padding-right:20px;padding-left:10px;"></a>
                                 <input type="text" style="font-size:16px; padding-left:3px; padding-top:3px;padding-bottom:3px;width:auto; border-radius:5px;" id="fieldSearch" name="search_text" >
                               <input type="submit" style="font-size:16px; padding:5px; border-radius:5px; background-color:green" value="Search">								
                              </form>
                        
                           
                            
                              <select id="pageRecord" style="display: none;">
                                <option value="5">5</option>
                                <option selected value="10">10</option>
                              </select>
                            
                          
                         
                        <div  id="divPageData"></div>
                     
                      
            </div>                   
        
                           		

	</div>
	
	<div class="item3" style="color:white; background-color:#E87F34; margin-top:10px">
	<a href="http://www.ccafs.in/" target="_blank"><img src="images/CCAFS.png" alt="CCAFS Logo" height="30"/></a>
	<a href="http://iita.org/" target="_blank"><img src="images/IITA_logo.png" alt="IITA Logo" height="30" /></a>
	<a href="http://metajua.com/"  target="_blank"><img src="images/Metajua.png" alt="Metajua Logo" height="30"/></a>
	<a href="http://www.worldagroforestry.org/" target="_blank"><img src="images/ICRAF.png" alt="ICRAF Logo" height="30" /></a>
	<a href="http://foreststreesagroforestry.org/ "target="_blank"><img src="images/FTA.png" alt="FTA Logo" height="30"/></a>
	<a href="admin/login.php" target="_blank"><img src="images/icon_admin.png" alt="IITA admin Logo" height="30" /></a>
	</div>
  </div>  

</body>
</html>