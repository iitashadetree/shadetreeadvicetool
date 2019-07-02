<?php


    session_start();
    require("../config/connection.php");
    if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['role']) && !empty($_SESSION['email'])) {
?>

  <?php 
  function dirToArray($dir) 
  {
    $result = array();
    $cdir = scandir($dir);
    foreach ($cdir as $key => $value)
    {
      if (!in_array($value,array(".","..","temp")) && strpos($value,"_") === false)
      {
       if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
       {
        $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
       }
       else
       {
        $result[] = $value;
       }
      }
    }
    return $result;
  }
  $samples = dirToArray("scores");

  if (!isset($_GET["filter"]))
    $_GET["filter"] = "free";
  ?>


<!DOCTYPE html>
<html>
<head>


<meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>IITA Tool - Admin Panel</title>
  <meta name="author" content="Jake Rocheleau">
  <link rel="icon" type="image/png" href="../image/favicon2.ico">
<link rel="stylesheet" type="text/css" media="all" href="css/styles.css">



<link rel="stylesheet" href="css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" media="screen" href="lib/js/themes/redmond/jquery-ui.custom.css"></link>	
<link rel="stylesheet" type="text/css" media="screen" href="lib/js/jqgrid/css/ui.jqgrid.css"></link>	 
<script src="lib/js/jquery.min.js" type="text/javascript"></script>
<script src="lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
<script src="lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	




</head>
<body>

  <div id="w" class="clearfix">
  <div id="logo">
    

        <div id="logo_header"><a href="#">
         <img src="images/iita_tool_logo3.png" height="70px" with="80%" alt="IITA Shade tree Logo"></a>
        </div>

        <div id="imageHolderLeftSpace">
                    <div id="logo_users">
                    Email: <span class="user_details" >test@test.com <?php //echo $_SESSION['email']; ?></span></br>Acount:<span class="user_details">Editor <?php //echo $_SESSION['role']; ?> </span></br><a href="logout.php">Sign out</a>
                    </div> 
        </div>
     
  </div>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'countries')" id="defaultOpen">Countries</button>
  <button class="tablinks" onclick="openCity(event, 'regions')">Regions</button>
  <button class="tablinks" onclick="openCity(event, 'trees')">Shade trees</button>
  <button class="tablinks" onclick="openCity(event, 'attributes')">Tree attributes</button>
  <button class="tablinks" onclick="openCity(event, 'crops')">Crops</button>
  <button class="tablinks" onclick="openCity(event, 'weights')">Farmer attribute Weights</button>
  <button class="tablinks" onclick="openCity(event, 'scores')">Farmer tree scores</button>
  <button class="tablinks" onclick="openCity(event, 'users')">User roles</button>
</div>



<div id="countries" class="contentblock">
    <div class = "titles-and-exports">
        <div class = "titles"> <h1>Countries</h1> </div>
        <div class = "exports">
            <span class="xlsx_downloadCountry"><a href="country/export_country.php">Download XLSX</a></span>
            <span class="xlsx_downloadCountry"><a href="country/export_country_csv.php">Download CSV</a></span>           
        </div>
    </div>      
<iframe onload="iframeLoaded(this)" name="demo_frame" frameborder="0" width="100%"  height="100%" src="country/editing/index.php"></iframe>
</div>

<div id="regions" class="contentblock">
    <div class = "titles-and-exports">
        <div class = "titles"> <h1>Regions</h1> </div>
        <div class = "exports">
            <span class="xlsx_downloadCountry"><a href="region/export_region.php">Download XLSX</a></span>
            <span class="xlsx_downloadCountry"><a href="region/export_region_csv.php">Download CSV</a></span>
        </div>
    </div>      
<iframe onload="iframeLoaded(this)" name="demo_frame" frameborder="0" width="100%"  height="100%" src="region/editing/index.php"></iframe>
</div>

<div id="trees" class="contentblock">
    <div class = "titles-and-exports">
        <div class = "titles"> <h1>Shade trees</h1> </div>
        <div class = "exports">
                <span class="xlsx_downloadCountry"><a href="tree/export_tree.php">Download XLSX</a></span>
                <span class="xlsx_downloadCountry"><a href="tree/export_tree_csv.php">Download CSV</a></span>
        </div>
    </div>      
<iframe onload="iframeLoaded(this)" name="demo_frame" frameborder="0" width="100%"  height="100%" src="tree/editing/index.php"></iframe>
</div>

<div id="attributes" class="contentblock">
    <div class = "titles-and-exports">
        <div class = "titles"> <h1>Tree attributes</h1> </div>
        <div class = "exports">
                <span class="xlsx_downloadCountry"><a href="attribute/export_attributes.php">Download XLSX</a></span>
                <span class="xlsx_downloadCountry"><a href="attribute/export_attributes_csv.php">Download CSV</a></span>
        </div>
    </div>      
<iframe onload="iframeLoaded(this)" name="demo_frame" frameborder="0" width="100%"  height="100%" src="attribute/editing/index.php"></iframe>
</div>

<div id="crops" class="contentblock">
    <div class = "titles-and-exports">
        <div class = "titles"> <h1>Crops</h1> </div>
        <div class = "exports">
                <span class="xlsx_downloadCountry"><a href="crop/export_crop.php">Download XLSX</a></span>
                <span class="xlsx_downloadCountry"><a href="crop/export_crop_csv.php">Download CSV</a></span>
        </div>
    </div>      
<iframe onload="iframeLoaded(this)" name="demo_frame" frameborder="0" width="100%"  height="100%" src="crop/editing/index.php"></iframe>
</div>

<div id="weights" class="contentblock">
    <div class = "titles-and-exports">
        <div class = "titles"> <h1>Farmer attribute Weights</h1> </div>
        <div class = "exports">
                <span class="xlsx_downloadCountry"><a href="weight/export_weight.php">Download XLSX</a></span>
                <span class="xlsx_downloadCountry"><a href="weight/export_weight_csv.php">Download CSV</a></span>
        </div>
    </div>      
<iframe onload="iframeLoaded(this)" name="demo_frame" frameborder="0" width="100%"  height="100%" src="weight/editing/index.php"></iframe>
</div>

<div id="scores" class="contentblock">
    <div class = "titles-and-exports">
        <div class = "titles"> <h1>Farmer tree scores</h1> </div>
        <div class = "exports">
          <span class="xlsx_downloadCountry"><a href="scores/export_scores.php">Download XLSX</a></span>
          <span class="xlsx_downloadCountry"><a href="scores/export_scores_csv.php">Download CSV</a></span>
          <span class="xlsx_downloadCountry"><a href="score_template.php?file=scoreTemplate.csv">Score Template</a></span>
        </div>
    </div>  



<!-- Begin EDIT CONTENT HERE -->

<a class="xlsx_downloadCountry score-button-batch-delete" href="#popup1">Delete By Batch</a>
            <div id="popup1" class="overlay">
              <div class="popup">
                <a class="close" href="#">&times;</a>
                  <div class="content">
                    <?php
                     

                          if(isset($_POST['DelBatch'])){
                            include '../config/connection.php';

                          $delBatch = $_POST['BatchID'];
                          $del = mysqli_query( $con, "DELETE from estimate_stderror where batchid = '".$delBatch."'");

                        }
                      ?>
                      <form action="#" method="post">
                        <div class="batches2">
                            <p><label for="batchEntry">Batch ID:</label>
                            <input type="text" id="BatchID" name="BatchID"></p>
                        </div>
                        <div class="submitButton2">
                            <p><input type="submit" value="Delete Batch" name="DelBatch" id="DelBatch" class="xlsx_downloadCountry2" style="width:150px"></p>
                        </div>
                      </form>
                </div>
              </div>
            </div>

            
            <a class="xlsx_downloadCountry score-button-batch-edit" href="#popup2">Edit By Batch</a>
          
            <div id="popup2" class="overlay">
              <div class="popup" id="popupEdit">
                <a class="close" href="#">&times;</a>
                  <div class="content">
                    <?php 
                      if(isset($_POST['mapping'])){
                            include '../config/connection.php';

                          $batchIDEdit = $_POST['batchIDEdit'];
                          $country_sys = $_POST['country_sys'];
                          $region_sys = $_POST['region_sys'];
                          $crop_sys = $_POST['crop_sys'];
                          include "attr_functions.php";
                          include "tree_functions.php";
                          $mappAttributes = mysqli_query( $con, "UPDATE estimate_stderror SET 
                                                                                      country='$country_sys',
                                                                                      region='$region_sys',
                                                                                      crop='$crop_sys',
                                                                                      attribute_user='$name',
                                                                                      tree_user='$name',
                                                                             
                                                                                      WHERE BatchID='batchIDEdit'") or die ("Data Upadate Failed!");;

                        }
                    ?>
                      <form action="#" method="post">
                        <div class="batches2"> 
                          <p><legend>Edit in Batches</legend></p>
                            <p><label for="batchEntry">Batch ID:</label>
                            <input type="text" id="batchIDEdit" name="batchIDEdit"></p>
                                <p><legend>Country</legend></p>
                                <p>
                                  <div style="float:left;bckground:pink;width:100%;">
                                    <p><div class="user">
                                      <label>Country[User]</label><select name="country_user" id="country_user">
                                      <?php   
                                      //include('../base.php');
                                          $country_user = mysqli_query( $con, "select distinct country from estimate_stderror order by country asc "); 
                                           
                                          while ($country_userFilter=mysqli_fetch_array($country_user)) {
                                          $country_userOption = $country_userFilter["country"]; 
                                          echo "<option> 
                                              $country_userOption
                                              </option>"; 
                                               } 
                                       ?>
                                     </select>
                                     </div>
                                     <div class="sys">
                                      <label>Country[System]</label><select name="country_sys" id="country_sys">
                                      <?php   
                                      //include('../base.php');
                                          $country_sys = mysqli_query( $con, "select distinct country from country order by country asc "); 
                                           
                                          while ($country_sysFilter=mysqli_fetch_array($country_sys)) {
                                          $country_sysOption = $country_sysFilter["country"]; 
                                          echo "<option> 
                                              $country_sysOption
                                              </option>"; 
                                               } 
                                       ?>
                                     </select>
                                    </div>
                                    </p>
                                  </div>
                                </p>


                                <p><legend>Region</legend></p>
                                <p>
                                  <div style="float:left;bckground:pink;width:100%;">
                                    <p>
                                      <div class="user">
                                      <label>Region[User]</label>
                                      <select name="region_user" id="region_user">
                                      <?php
                                       $region_user = mysqli_query( $con, "select distinct region from estimate_stderror order by region asc "); 
                                       
                                      while ($region_userFilter=mysqli_fetch_array($region_user)) {
                                      $region_userOption = $region_userFilter["region"]; 
                                      echo "<option> 
                                          $region_userOption
                                          </option>"; 
                                           }
                                           ?>                                    
                                      </select>
                                    </div>
                                    <div class="sys">
                                      <label>Region[System]</label>

                                      <select name="region_sys" id="region_sys">
                                      <?php
                                       $region_sys = mysqli_query( $con, "select distinct region from region order by region asc "); 
                                       
                                      while ($region_sysFilter=mysqli_fetch_array($region_sys)) {
                                      $region_sysOption = $region_sysFilter["region"]; 
                                      echo "<option> 
                                          $region_sysOption
                                          </option>"; 
                                           }
                                           ?>                                     
                                      </select>
                                    </div>
                                    </p>
                                  </div>
                                </p>


                                <p><legend>Crop</legend></p>
                                <p>
                                  <div style="float:left;bckground:pink;width:100%;">
                                    <p>
                                      <div class="user">
                                      <label>Crop[User]</label>
                                      <select name="crop_user" id="crop_user">
                                         <?php                                            
                                             $crop_user = mysqli_query( $con, "select distinct crop from estimate_stderror order by crop asc ");                                        
                                            while ($crop_userFilter=mysqli_fetch_array($crop_user)) {
                                            $crop_userOption = $crop_userFilter["crop"]; 
                                            echo "<option> 
                                                $crop_userOption
                                                </option>"; 
                                                 }                                          
                                          ?>
                                      </select>
                                      </div>
                                      <div class="sys">
                                      <label>Crop[System]</label>
                                      <select name="crop_sys" id="crop_sys">
                                         <?php                                            
                                             $crop_sys = mysqli_query( $con, "select distinct crop from crop order by crop asc ");                                        
                                            while ($crop_sysFilter=mysqli_fetch_array($crop_sys)) {
                                            $crop_sysOption = $crop_sysFilter["crop"]; 
                                            echo "<option> 
                                                $crop_sysOption
                                                </option>"; 
                                                 }                                          
                                          ?>
                                      </select>
                                      </div>
                                    </p>
                                  </div>
                                </p>

                                <p><legend>Attributes</legend></p>
                                <p>
                                  <div style="float:left;bckground:pink;width:100%;">
                                     
                                      <div class="user" style="background:pink;width:23%;">
                                      <table style="float: right;">
                                        <tr><th>User Attributes</th></tr>
                                         <?php                                            
                                             $attribute_user = mysqli_query( $con, "select distinct attribute_user from estimate_stderror where attribute_user not in ('','Attribute_user') order by attribute_user asc");                                        
                                            $count = 1;
                                            while ($attribute_userFilter=mysqli_fetch_array($attribute_user)) {
                                            $attribute_userOption = $attribute_userFilter["attribute_user"]; 
                                            echo '<tr>';
                                            echo '<td><input type="text" name="attribute_user_'.$count.'" value="'.$attribute_userOption.'"></td>';
                                            echo '</tr>';
                                            $count++;
                                                 }                                          
                                          ?>
                                      </table>
                                      </div>


                                      
                                      <div class="user" style="background:pink;width:23%;">
                                      <label style="color: #333;">System Attributes</label>
                                                  <div style="float:left;bckground:pink;width:100%;margin-left: -7%;mrgin-top: 3.2%;">
                                      <div class="input_fields_wrap"> 
                                            <div>     
                                                <select  class= "attribute" name="attribute_sys" style="bckground:#EBECED;width:180px;float:left;">
                                                <?php include "attr_sys.php";  ?>
                                                </select>
                                            </div>
                                      </div>
                                    
                                    

                                    <style>
                                        #attribute_user{width: 180px;}
                                        a{text-decoration: none;margin-left:3px;color:#fff;}
                                        .me{margin-left:15px;}
                                        .input_fields_wrap select{width: 180px;}
                                        .input_fields_wrap {width:100%;height: 20px;bckground-color:#DDDDDD;border-radius: 5px;padding: 0px;font-size: 100%;mrgin-bottom: 3px;text-align: left;}
                                    </style>

                                    <button class="add_field_button"> Add Attribute </button>
                                    <script>
                                    $(document).ready(function() {
                                        var max_fields      = 20; //maximum input boxes allowed
                                        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
                                        var add_button      = $(".add_field_button"); //Add button ID
                                        
                                        var x = 1; //initlal text box count
                                        $(add_button).click(function(e){ //on add input button click
                                            e.preventDefault();
                                            if(x < max_fields){ //max input box allowed
                                                x++; //text box increment
                                               $(wrapper).append('<div style="float:left;bckground:pink;width:100%;mrgin-top: 3px;"><select  class= "attribute" name="attribute_sys_'+x+'" style="bckground:#EBECED;width:180px;float:left;"><?php include "attr_sys.php"; ?></select><a href="#" class="remove_field" style="color:#333;">x</a></div>'); //add input box

                                            }
                                        });                                        
                                        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                                            e.preventDefault(); $(this).parent('div').remove(); x--;
                                        })
                                    });
                                    </script>
                                      
                                    
                                  </div>
                                   
                                  </div>








                                  <div class="user" style="background:pink;width:23%;">
                                      <label style="color: #333;">System Attributes</label>
                                                  <div style="float:left;bckground:pink;width:100%;margin-left: -7%;mrgin-top: 3.2%;">
                                      <div class="input_fields_wrap"> 
                                            <div>     
                                                <select  class= "attribute" name="attribute_sys" style="bckground:#EBECED;width:180px;float:left;">
                                                <?php include "attr_sys.php";  ?>
                                                </select>
                                            </div>
                                      </div>
                                    
                                    

                                    <style>
                                        #attribute_user{width: 180px;}
                                        a{text-decoration: none;margin-left:3px;color:#fff;}
                                        .me{margin-left:15px;}
                                        .input_fields_wrap select{width: 180px;}
                                        .input_fields_wrap {width:100%;height: 20px;bckground-color:#DDDDDD;border-radius: 5px;padding: 0px;font-size: 100%;mrgin-bottom: 3px;text-align: left;}
                                    </style>

                                    <button class="add_field_button"> Add Attribute </button>
                                    <script>
                                    $(document).ready(function() {
                                        var max_fields      = 20; //maximum input boxes allowed
                                        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
                                        var add_button      = $(".add_field_button"); //Add button ID
                                        
                                        var x = 1; //initlal text box count
                                        $(add_button).click(function(e){ //on add input button click
                                            e.preventDefault();
                                            if(x < max_fields){ //max input box allowed
                                                x++; //text box increment
                                               $(wrapper).append('<div style="float:left;bckground:pink;width:100%;mrgin-top: 3px;"><select  class= "attribute" name="attribute_sys_'+x+'" style="bckground:#EBECED;width:180px;float:left;"><?php include "attr_sys.php"; ?></select><a href="#" class="remove_field" style="color:#333;">x</a></div>'); //add input box

                                            }
                                        });                                        
                                        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                                            e.preventDefault(); $(this).parent('div').remove(); x--;
                                        })
                                    });
                                    </script>
                                      
                                    
                                  </div>
                                   
                                  </div>
                                </p>



                                  </div>
                                </p>



                                                                
                                <p>
                                  <div style="float:left;bckground:pink;width:100%;">
                                      <label style="color: #333;">User Attributes2</label>





                                </p>

                                  </div>
                                </p>
                                <p><legend>Trees</legend></p>
<p>
                                  <div style="float:left;bckground:pink;width:100%;">
                                     
                                      <div class="user" style="bckground:pink;">
                                      <table style="float: right;">
                                        <tr><th>Tree  User</th></tr>
                                         <?php                                            
                                             $tree_user = mysqli_query( $con, "SELECT distinct tree_user from estimate_stderror where tree_user not in ('','tree_user') order by tree_user asc");                                       
                                            $count = 1;
                                            while ($tree_userFilter=mysqli_fetch_array($tree_user)) {
                                            $tree_userOption = $tree_userFilter["tree_user"]; 
                                            echo '<tr>';
                                            echo '<td><input type="text" name="tree_user_'.$count.'" value="'.$tree_userOption.'"></td>';
                                            echo '</tr>';
                                            $count++;
                                                 }                                          
                                          ?>
                                      </table>
                                      </div>
                                      <label style="color: #333;">System Trees</label>
                                      <div class="sys">
                                                  <div style="float:left;bckground:pink;width:100%;margin-left: -7%;mrgin-top: 3.2%;">
                                      <div class="input_fields_wrap2"> 
                                            <div>     
                                                <select  class= "tree" name="tree_sys" style="bckground:#EBECED;width:180px;float:left;">
                                                <?php include "tree_sys.php";  ?>
                                                </select>
                                            </div>
                                      </div>
                                    
                                    

                                    <style>
                                        #tree_user{width: 180px;}
                                        a{text-decoration: none;margin-left:3px;color:#fff;}
                                        .me{margin-left:15px;}
                                        .input_fields_wrap2 select{width: 180px;}
                                        .input_fields_wrap2 {width:100%;height: 20px;bckground-color:#DDDDDD;border-radius: 5px;padding: 0px;font-size: 100%;mrgin-bottom: 3px;text-align: left;}
                                    </style>

                                    <button class="add_field_button2"> Add Tree </button>
                                    <script>
                                    $(document).ready(function() {
                                        var max_fields      = 50; //maximum input boxes allowed
                                        var wrapper         = $(".input_fields_wrap2"); //Fields wrapper
                                        var add_button      = $(".add_field_button2"); //Add button ID
                                        
                                        var x = 1; //initlal text box count
                                        $(add_button).click(function(e){ //on add input button click
                                            e.preventDefault();
                                            if(x < max_fields){ //max input box allowed
                                                x++; //text box increment
                                               $(wrapper).append('<div style="float:left;bckground:pink;width:100%;mrgin-top: 3px;"><select  class= "tree" name="tree_sys_'+x+'" style="bckground:#EBECED;width:180px;float:left;"><?php include "tree_sys.php";  ?></select><a href="#" class="remove_field" style="color:#333;">x</a></div>'); //add input box

                                            }
                                        });                                        
                                        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                                            e.preventDefault(); $(this).parent('div').remove(); x--;
                                        })
                                    });
                                    </script>
                                      
                                    
                                  </div>
                                   
                                  </div>
                                </p>
                                  </div>
                                </p>                                

                        </div>
                        <div class="submitButton">
                            <input type="submit" value="Edit Batch" class="xlsx_downloadCountry2" name="mapping" id="mapping" style="width: 100px;">
                        </div>
                      </form>
                </div>
              </div>
            </div>

<!-- END EDIT CONTENT HERE -->




<iframe onload="iframeLoaded(this)" name="demo_frame" frameborder="0" width="100%"  height="100%" src="scores/editing/index.php"></iframe>

</div>

<div id="users" class="contentblock">
    <div class = "titles-and-exports">
        <div class = "titles"> <h1>User roles</h1> </div>
        <div class = "exports">
                <span class="xlsx_downloadCountry"><a href="user/export_users.php">Download XLSX</a></span>
                <span class="xlsx_downloadCountry"><a href="user/export_users_csv.php">Download CSV</a></span>
        </div>
    </div>      
<iframe onload="iframeLoaded(this)" name="demo_frame" frameborder="0" width="100%"  height="100%" src="user/editing/index.php"></iframe>
</div>








<script src="js/jquery.js"></script>    
<script src="../advice/js/jquery.min.js"></script>

<script src="js/modernizr.custom.js"></script> 
<script type="text/javascript" src="js/jquery.form.js"></script>
<script>
$(document).ready(function() {        
        $('#ad').live('click', function(){ 
          $("#imageform").submit();
    
        });
    }); 
</script>



<script>
function openCity(evt, cityName) {
    var i, contentblock, tablinks;
    contentblock = document.getElementsByClassName("contentblock");
    for (i = 0; i < contentblock.length; i++) {
        contentblock[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
     
</body>
</html> 


<?php

} else {
  echo 'Not Authorised';
    echo "";
}

?>