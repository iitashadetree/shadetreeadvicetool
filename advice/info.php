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
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />	
<?php include '../contact/feedbacklinks2.php'; ?>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery.accordion.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/jquery.collapsible.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    //collapsible management
    $('.collapsible').collapsible({
      defaultOpen: 'nav-section1,nav-section3'
    });
  });
</script> 
 <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
<!--start-home-->
  <div class="headerCotent" style="height:60px;padding-top:5px;bckground:red;z-index:99999;position:absolute">
        <div id="headerContainer">
                    <a href=../index.php><img src="images/logo_white.png" alt="Shade Tool Logo" height="52" width="64"/>
                    <span class="headerTitle" style="width:100%;min-width:680px;height:auto;">Shade tree advice tool</span></a>
        </div>
</div>

       <div class="container" style="z-index:999999999;background:url(images/cont_bg.png); margin-top: 40px;min-height:400px;width:48%;min-width:875px;margin: auto;  position: absolute;  top: 15%; bottom:15%;left: 0; right: 0;">   	     					  
										        	
						<div class="leftContent"><a href=../index.php><i class="fa fa-angle-left" style="float:left;top: -6px;left: -120px"></i></a></div>
						<div class="middleContent" style="margin-left: 67px;margin-top: -54px;float:left;min-height:416px;width:47%;min-width:723px;">
						    <div class="accordion" id="section1">How does this tool work?<span></span></div>
						    <div class="container2">
						        <div class="content2">
						            <p>You grow crops that grow better under shaded trees? This tool is designed to help you select appropriate shade trees. 
						            	We interviewed farmers in different regions, asking them for their opinions on shade trees. These opinions are analyzed 
						            	and are the basis for this tool. 
						            </p>
						            <p>
						            	When you want to know which shade trees are best for your farm, please use this tool. You first select your country, 
						            	region and crop of interest. After that, you are asked to select different attributes (ecosystem services) that you 
						            	think are important for your shade tree to have. You can weigh the attributes, in order to prioritize some attributes 
						            	over others. The calculated advice is then displayed as a graph, and the best trees for your criteria will be displayed 
						            	on top. The graph uses colors to show you how each tree performs for each of the selected attributes. 
						            </p>
						            <p>
						            	We want to stimulate the use of shade trees, but we want to emphasize the importance of diversifying your plantation! A more diverse 
						            	selection of shade trees is more versatile and sustainable for you and your farm.  
						            </p>

						        </div>
						    </div>
						    <div class="accordion" id="section2">Expanding the tool<span></span></div>
						    <div class="container2">
						        <div class="content2">
						            <p>This tool is limited to the regions where local knowledge has already been gathered. Also, in these regions it is limited
						             to the trees that were ranked and the ecosystem services that were chosen. If you want to expand the tool, feel free to do so. 
						             However, be sure to use appropriate scientific methods, and ask IITA for assistance where needed 
						             (see below for more contact information). A simplified protocol:
						            </p>
						            <p>
						            	<ol>
						            		<li>Select the target zone (country, region, etc.)</li>
						            		<li>Identify ecosystem services (attributes) that are relevant for your target zone</li>
						            		<li>Select shade tree species based on inventories on local farms</li>
						            		<li>Target the population of interest, taking into account gender and youth</li>
						            		<li>Interview farmers on tree knowledge and let them rank tree species for selected ecosystem services.</li>
						            	</ol>
						            </p>

						        </div>
						    </div>
						    <div class="accordion" id="section3">Scientific links<span></span></div>
						    <div class="container2">
						        <div class="content2">
						            <p><a href="#">Original paper</a></p>
						            <p><ul>Scientists involved:</ul></p>
						            <p>
						            	<ol>
						            		<li>
						            			Laurence Jassogne: 
						            			<a href="https://be.linkedin.com/pub/laurence-t-p-jassogne/13/7a6/801" target = "_blank">LinkedIn</a>, 
						            			<a href="https://www.researchgate.net/profile/Laurence_Jassogne">ResearchGate</a>, 
						            			<a href="http://www.iita.org/staff-crp/-/asset_publisher/Wg6T/content/jassogne-laurence?redirect=%2Fstaff-crp%2F-%2Fasset_publisher%2FZ9e1%2Fcontent%2Fyade-mbaye%3Fredirect%3D%252Fstaff-crp">IITA</a>
						            		</li>
						            		<li>
						            			Philippe Vaast: 
						            			<a href="#">LinkedIn</a>, 
						            			<a href="https://www.researchgate.net/profile/Philippe_Vaast">ResearchGate</a>
						            			<a href="#">IITA</a>
						            		</li>
						            		<li>
						            			Just van der Wolf: 
						            			<a href="https://ug.linkedin.com/in/justvanderwolf">LinkedIn</a>, 
						            			<a href="https://www.researchgate.net/profile/Just_Van_Der_Wolf">ResearchGate</a>
						            			<a href="#">IITA</a>
						            		</li>
						            		<li>Gilles Gram: 
						            			<a href="https://www.linkedin.com/pub/gil-gram/49/89a/935/en">LinkedIn</a>,
						            			<a href="https://www.researchgate.net/profile/Gil_Gram">ResearchGate</a>, 
						            			<a href="#">IITA</a>
						            		</li>
						            	</ol>
						            </p>
						        </div>
						    </div>
						</div>
						<div class="rightContent" style="position: absolute;top: 22px;left: 803px;"><img src='images/icon_info.png' height='52' width='52' style='margin-right: 20px;' /></div>
					
	          </div>
</div>	
<?php  include '../contact/feedback.php'; ?>

<div class="copy" style="margin-top: 40px;width:100%;mn-width:1280px;position:fixed;bottom:0;margin-left:0;height:50px;">
<div id="copyCotents">
	<div class="footerCotenets"><a href="http://www.ccafs.in/"><img src="images/CCAFS.png" alt="CCAFS Logo" height="50" /></a></div>
	<div class="footerCotenets"><a href="http://iita.org/"><img src="images/IITA_logo.png" alt="IITA Logo" height="50" /></a></div>
	<div class="footerCotenets">Powered by</br> <a href="http://wwww.mymetajua.com/"><img src="images/Metajua.png" alt="Metajua Logo" height="30" /><span class="aCopy">&copy; 2013 | Bugolobi</span></a></div>	
	<div class="footerCotenets"><a href="http://www.worldagroforestry.org/"><img src="images/ICRAF.png" alt="ICRAF Logo" height="50" /></a></div>
	<div class="footerCotenets" style="bckground:orange;margin-top: 10px;"><a href="http://foreststreesagroforestry.org/"><img src="images/FTA.png" alt="FTA Logo" height="30"  /></a></div>
	<div class="footerCotenets" style="bckground:orange;margin-right:0px;"><a href="../admin/index.php"><img src="images/icon_admin.png" alt="IITA admin Logo" height="50" /></a></div>	
	</div>
</div><!--footer-->


<SCRIPT language=JavaScript>
{
    cssClose: 'collapse-close',
    cssOpen: 'collapse-open',
    cookieName: 'collapsible',
    cookieOptions: {
        path: '/',
        expires: 7,
        domain: '',
        secure: ''
    },
    defaultOpen: '',
    speed: 300,
    bind: 'click',
    animateOpen: function (elem, opts) { 
        elem.next().slideUp(opts.speed);
    },
    animateClose: function (elem, opts) {
        elem.next().slideDown(opts.speed);
    },
    loadOpen: function (elem, opts) {
        elem.next().show();
    },
    loadClose: function (elem, opts) {
        elem.next().hide();
    }
}
 </script>

<SCRIPT language=JavaScript>
 $(document).ready(function() {

        //custom animation for open/close
        $.fn.slideFadeToggle = function(speed, easing, callback) {
            return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
        };

        $('.accordion').accordion({
            defaultOpen: 'section1',
            cookieName: 'nav',
            speed: 'slow',
            animateOpen: function (elem, opts) { //replace the standard slideUp with custom function
                elem.next().stop(true, true).slideFadeToggle(opts.speed);
            },
            animateClose: function (elem, opts) { //replace the standard slideDown with custom function
                elem.next().stop(true, true).slideFadeToggle(opts.speed);
            }
        });
    });
</script>
</body>
</html>