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


  <link rel="stylesheet" type="text/css" href="css/country.css" />
  <link rel="stylesheet" type="text/css" href="css/component.css" />
  <link rel="stylesheet" type="text/css" href="css/content.css" />
  <script src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/pagination_country.js"></script>
  <script src="js/modernizr.custom.js"></script> 


<!--webfonts-->
<link rel="stylesheet" href="css/font-awesome.min.css">
<!--//webfonts-->
<?php include '../contact/feedbacklinks2.php'; ?>
<link rel="stylesheet" type="text/css" media="all" href="css/styles.css"> 
</head>
<body>
  
<!--start-home-->

  <div class="headerCotent" style="height:62px;bckground:red;z-index:99999;position:absolute;padding:5px;">
        <div id="headerContainer">
                    <a href=../index.php><img src="images/logo_white.png" alt="Shade Tool Logo" height="52" width="64"/>
                    <span class="headerTitle" style="width:100%;min-width:680px;height:auto;">Shade tree advice tool</span></a>
        </div>
</div>

       <div class="container" style="z-index:999999999;background:url(images/cont_bg.png); margin-top: 40px;min-height:380px;width:48%;min-width:875px;margin: auto;  position: absolute;  top: 15%; bottom:15%;left: 0; right: 0;">                      
            <div class="leftContent"><a href=../index.php><i class="fa fa-angle-left" style="float:left;top: -6px;left: -120px;"></i></a></div>
            <div class="middleContent" style="left:10%;right:10%;margin: auto;top:0%;position:absolute;min-height:400px;width:75%;min-width:38px;">

                      <div id="country-content" class="contentblock" >
                              <div id="formDiv" >
                              <form id="formSearch" >
                                 <input type="text" id="fieldSearch" name="search_text" >
                                <input type="submit" value="Search">
                              </form>
                           <div  id="divLoading"></div> 
                           <div id="selectDiv">
                             <small>
                              <select id="pageRecord" style="display: none;">
                                <option value="5">5</option>
                                <option selected value="10">10</option>
                              </select><i> </i>
                             </small>
                          </div>
                         </div>
                        <div  id="divPageData" style="overflow:scroll;"></div>
                      </div><!-- @end #country-content -->
                      
                  </div><!-- @end #content -->
       
         
            <img src='images/icon_treelibrary.png' height='52' width='52' style='top: 6%;left: 92%;position: absolute;' />
            </div>
</div>  
<?php include '../contact/feedback.php'; ?>
<?php include 'footer.php'; ?>

</body>
</html>
