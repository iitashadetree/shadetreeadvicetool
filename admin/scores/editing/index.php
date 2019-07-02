<?php
/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 1.5.2
 * @license: see license.txt included in package
 */

// include db config
include_once("../../../config/config.php");

define("PHPGRID_LIBPATH",dirname(__FILE__).DIRECTORY_SEPARATOR."../../lib".DIRECTORY_SEPARATOR);
// set up DB
$con = mysqli_connect(PHPGRID_DBHOST, PHPGRID_DBUSER, PHPGRID_DBPASS);
mysqli_select_db( $con, PHPGRID_DBNAME);

// include and create object
include(PHPGRID_LIBPATH."inc/jqgrid_dist.php");
$g = new jqgrid();
$grid["autowidth"] = false;
$grid["shrinkToFit"] = false; // dont shrink to fit on screen
$grid["width"] = "1020";
$grid["height"] = "365";
// set few params
$grid["caption"] = "Scores";
$g->set_options($grid);

// set database table for CRUD operations
$g->table = "estimate_stderror";

// render grid
$out = $g->render("list5");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>

<link rel="stylesheet" href="../../css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="Popup/css/pop_up.css" />

	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/themes/redmond/jquery-ui.custom.css"></link>	
	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/jqgrid/css/ui.jqgrid.css"></link>	
 
	<script src="../../lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="../../lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="../../lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
    <script type="text/javascript" src="Popup/js/jquery.leanModal.min.js"></script>
</head>
<body>


	<div style="margin:10px">
	<?php echo $out?>
	</div>

    <a id="modal_trigger" href="#modal" class="btn add-data-button" style="color:#fff;float:left;position: absolute;bottom:29px;left: 216px;">Add Data</a>
   
    <div id="modal" class="popupContainer" style="display:none;top:20px;">
        <header class="popupHeader">
            <span class="header_title">Farmer Weight</span>
            <span class="modal_close"><i class="fa fa-times"></i></span>
        </header>
        
        
        <section class="popupBody">
            <!-- Social Login -->
            <div class="social_login">
                <div class="centeredText">                    
                    <form id="imageform" method="post" enctype="multipart/form-data" action="Popup/uploader.php"><div class="far">
                    <fieldset>
                    
                           <p> <label>Country</label> 
                                <select name="country" id="country">
                            <?php   
                            include('base.php');
                                $country = mysqli_query( $con, "select distinct country from country order by country asc "); 
                                 
                                while ($countryFilter=mysqli_fetch_array($country)) {
                                $countryOption = $countryFilter["country"]; 
                                echo "<option> 
                                    $countryOption
                                    </option>"; 
                                     } 
                             ?>
                                    
                                </select><p></p>
                                <label>Region</label>
                                <select name="region" id="region">
                                <?php
                                 $region = mysqli_query( $con, "select distinct region from region order by region asc "); 
                                 
                                while ($regionFilter=mysqli_fetch_array($region)) {
                                $regionOption = $regionFilter["region"]; 
                                echo "<option> 
                                    $regionOption
                                    </option>"; 
                                     }
                                     ?> 
                                
                                
                                </select><p></p>
                                <label>Crop</label>
                                <select name="crop" id="crop">
                                   <?php
                                      
                                 $crop = mysqli_query( $con, "select distinct crop from crop order by crop asc "); 
                                 
                                while ($cropFilter=mysqli_fetch_array($crop)) {
                                $cropOption = $cropFilter["crop"]; 
                                echo "<option> 
                                    $cropOption
                                    </option>"; 
                                     }
                                    
                                    ?>
                                </select><p></p>
                                <label>Batch ID</label>
                                <input type="text" name="BatchID" style="width:220px" required ="true"><p></p>
                                 
                            Choose your file: <br /> 
  <input name="csv" type="file" id="csv" /> 
  <input type="submit" name="Submit" value="Submit" />    </fieldset>
                            </form>
                </div>
                <!---
                <div class="action_btns">
                    <div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
                </div>
                -->
            </div>

            
           
        </section>
    </div>


<script type="text/javascript">
    $("#modal_trigger").leanModal({top : 20, overlay : 0.6, closeButton: ".modal_close" });

    $(function(){
        // Calling Login Form
        $("#login_form").click(function(){
            $(".social_login").hide();
            $(".user_login").show();
            return false;
        });

        // Calling Register Form
        $("#register_form").click(function(){
            $(".social_login").hide();
            $(".user_register").show();
            $(".header_title").text('Register');
            return false;
        });

        // Going back to Social Forms
        $(".back_btn").click(function(){
            $(".user_login").hide();
            $(".user_register").hide();
            $(".social_login").show();
            $(".header_title").text('Login');
            return false;
        });

    })
</script>  

</body>
</html>
