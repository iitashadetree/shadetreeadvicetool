<?php
require "config/connection.php"; // Your Database details 
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Shade tree advice</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="image/favicon2.ico">
<script type="applijegleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="advice/css/style.css" rel='stylesheet' type='text/css' />	

<?php include 'contact/feedbacklinks.php'; ?>

</head>
<body>
<!--start-home-->
  <div class="headerCotent" style="height:60px;padding-top:5px;bckground:red;z-index:99999;position:absolute">
        <div id="headerContainer">
                    <a href="index.php"><img src="advice/images/logo_white.png" alt="Shade Tool Logo" height="52" width="64"/>
                    <span class="headerTitle" style="width:100%;min-width:680px;height:auto;">Shade tree advice tool</span></a>
        </div>
</div>
  

			  <div class="container" style="z-index:99999;background:url(advice/images/cont_bg.png); margin-top: 40px;min-height: 350px;width:48%;min-width:875px;margin: auto;  position: absolute;  top: 15%; left: 0; bottom: 15%; right: 0;">
              
           </div>

           <div id="containerImage"style="z-index:99999999999;">          
              <a href='advice/tool.php'  title="Advice Tool">
                <div class="indexIcons">
                <img src="advice/images/icon_tool.png" alt="IITA Logo"  width="262px" style="margin-top:30px"/></div></a>
              <a href="advice/tree.php"  style="left:-490px;top:350px" title="Tree Library">
                <div class="indexIcons">
                <img src="advice/images/icon_treelibrary.png" alt="IITA Logo"  width="250px"/></div></a>
              <a href="advice/info.php"  style="left:-210px;top:350px" title="Tool Information">
                <div class="indexIcons">
                  <img src="advice/images/icon_info.png" alt="IITA Logo"  width="250px" style="margin-top:25px; margin-left:15px"/></div></a>
              </div>
<style>
#containerImage{position:absolute;
  margin: auto;
  position: absolute;  top: 10%; left: 0; bottom: 15%; right: 0;
  bckground: aqua;width:777px;height:286px;}
</style>




  <input type="radio" name="r" id="open">
  <input type="radio" name="r" id="close">
  <div class="f-button"><label for="open">Feedback</label></div>
  <div id="form" style="z-index: 9999999999;">
      <div id="form-div"><P>Contact Us</p>
          <div class="close"><p><label for="close">X</label></p></div>

            <form class="form" id="form1" action="ajaxSubmit.php">
              <p class="name">
                <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] text-input" id="name" required placeholder="Input Your Name" />
          
              </p>
              <p class="email">
                <input name="email" type="text" class="validate[required,custom[email]] text-input" id="email" required placeholder="Input Your Email" />
                
              </p>
              <p class="Subject">
                <input type="text" name="subject" id="subject" placeholder="Subject" />
                
              </p>
              <p class="text" style="border:0px;">
                <textarea placeholder="Your Comment" name="text" class="validate[required,length[6,300]] text-input" id="comment"></textarea>
              </p>
              <p class="submit">
                <input type="submit" value="Send" class="sb" />
              </p>
            </form>
          </div>
      </div>
</div>


<div class="copy" style="margin-top: 40px;width:100%;mn-width:1280px;position:fixed;bottom:0;margin-left:0;height:50px;">
	<div id="copyCotents">
	<div class="footerCotenets"><a href="http://www.ccafs.in/"><img src="advice/images/CCAFS.png" alt="CCAFS Logo" height="50" /></a></div>
	<div class="footerCotenets"><a href="http://iita.org/"><img src="advice/images/IITA_logo.png" alt="IITA Logo" height="50" /></a></div>
	<div class="footerCotenets">Powered by</br> <a href="http://wwww.mymetajua.com/"><img src="advice/images/Metajua.png" alt="Metajua Logo" height="30" /><span class="aCopy">&copy; 2013 | Bugolobi</span></a></div>	
	<div class="footerCotenets"><a href="http://www.worldagroforestry.org/"><img src="advice/images/ICRAF.png" alt="ICRAF Logo" height="50" /></a></div>
	<div class="footerCotenets" style="bckground:orange;margin-top: 10px;"><a href="http://foreststreesagroforestry.org/"><img src="advice/images/FTA.png" alt="FTA Logo" height="30"  /></a></div>
	<div class="footerCotenets" style="bckground:orange;margin-right:0px;"><a href="admin/login.php"><img src="advice/images/icon_admin.png" alt="IITA admin Logo" height="50" /></a></div>	
	</div>
</div><!--footer-->	
</body>
</html>