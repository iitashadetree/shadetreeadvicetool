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
	
<link href="style.css" rel="stylesheet" type="text/css" />
<?php include '../contact/feedbacklinks2.php'; ?>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery.accordion.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/jquery.collapsible.js"></script>


<style>
body { height:100%; margin-top:5px; margin-bottom:5px;}
.item1 { grid-area: header; height:auto;}
.item2 { grid-area: main; width:100%; height:auto; }
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

.accordion {
background-color: #eee;
color: #444;
cursor: pointer;
padding: 5px;
width: 100%;
border: none;
text-align: center;
outline: none;
font-size: 18px;
transition: 0.4s;
font-family:arial;
}

p, li, ol, ul{
font-size:15px;
font-family:arial;

}
.active, .accordion:hover {
background-color: #ccc;
}

.accordion:after {
content: '\002B';
color: #777;
float: right;
margin-left: 5px;
}

.active:after {
content: "\2212";
}

.panel {
padding: 0 30px;
font-family:arial;
display:block;
height:auto;
background-color: white;
max-height: 0;
transition: max-height 0.2s ease-out;
overflow: scroll;
scroll-behavior: smooth;
text-align: left;
line-height: 1.3;
margin:1%;
}

</style>
<?php include '../contact/feedbacklinks2.php'; ?>
</head>

<body style="background-image: url('images/Tree_background.jpg');">

<div class="grid-container">

<!--start-home-->
<div class="item1" style="color:white; background-color:#E87F34">
<a href="../index.php" style="color:white; text-decoration:none; font-size: 20px; font-weight: bold">Shade Tree Advice Tool</a>
</div>

<div class="item2">       					  										        									
<a href= "../index.php" ><img src="images/gobck.png" title = "Go back to home" style="padding-right:300px;"></a>
<button class="accordion">How does this tool work?</button>
<div class="panel">
<p>You grow crops that grow better under shaded trees? <br> * This tool is designed to help you select appropriate shade trees.
We interviewed farmers in different regions, asking them for their opinions on shade trees. <br> * These opinions are analyzed 
and are the basis for this tool.</p>

<p>
When you want to know which shade trees are best for your farm, please use this tool.<br> * You first select your country, 
region and crop of interest. After that, you are asked to select different attributes (ecosystem services) that you 
think are important for your shade tree to have. <br> * You can weigh the attributes, in order to prioritize some attributes 
over others. <br> * The calculated advice is then displayed as a graph, and the best trees for your criteria will be displayed 
on top. <br> * The graph uses colors to show you how each tree performs for each of the selected attributes. 
</p>
</div>

<button class="accordion">Expanding the tool</button>
<div class="panel">
<p>This tool is limited to the regions where local knowledge has already been gathered. <br>Also, in these regions it is limited
to the trees that were ranked and the ecosystem services that were chosen. <br> If you want to expand the tool, feel free to do so. 
<br>However, be sure to use appropriate scientific methods, and ask IITA for assistance where needed 
(see below for more contact information). <br> <b> * A simplified protocol:</b>
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

<button class="accordion">Scientific links</button>
<div class="panel">
<p style="text-align: center;"><a href="#">Original paper</a></p>
<p style="text-align: center;"><ul style="text-align: center;">Scientists involved:</ul></p>

<ul style="text-align: center; list-style-type:none;">
<li>
Laurence Jassogne: 
<a href="https://be.linkedin.com/pub/laurence-t-p-jassogne/13/7a6/801" target="_blank">LinkedIn</a>, 
<a href="https://www.researchgate.net/profile/Laurence_Jassogne" target="_blank">ResearchGate</a>, 
<a href="http://www.iita.org/staff-crp/-/asset_publisher/Wg6T/content/jassogne-laurence?redirect=%2Fstaff-crp%2F-%2Fasset_publisher%2FZ9e1%2Fcontent%2Fyade-mbaye%3Fredirect%3D%252Fstaff-crp" target="_blank">IITA</a>
</li>
<li>
Philippe Vaast: 
<a href="#" target="_blank">LinkedIn</a>, 
<a href="https://www.researchgate.net/profile/Philippe_Vaast" target="_blank">ResearchGate</a>
<a href="#" target="_blank">IITA</a>
</li>

<li>
Just van der Wolf: 
<a href="https://ug.linkedin.com/in/justvanderwolf" target="_blank">LinkedIn</a>, 
<a href="https://www.researchgate.net/profile/Just_Van_Der_Wolf" target="_blank">ResearchGate</a>
<a href="#" target="_blank">IITA</a>
</li>

<li>
Gilles Gram: 
<a href="https://www.linkedin.com/pub/gil-gram/49/89a/935/en" target="_blank">LinkedIn</a>,
<a href="https://www.researchgate.net/profile/Gil_Gram" target="_blank">ResearchGate</a>, 
<a href="#">IITA</a>
</li>
</ul>
</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
acc[i].addEventListener("click", function() {
this.classList.toggle("active");
var panel = this.nextElementSibling;
if (panel.style.maxHeight){
panel.style.maxHeight = null;
} else {
panel.style.maxHeight = panel.scrollHeight + "px";
} 
});
}
</script>

</div> 

  <!--footer-->
    <div class="item3" style="color:white; background-color:#E87F34; margin-top:5px;">
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