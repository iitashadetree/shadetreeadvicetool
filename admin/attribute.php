<?php
                         
include 'config1.php';
mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("MySQL Error: " . mysql_error());  
mysql_select_db($DB_DBName) or die("MySQL Error: " . mysql_error()); 
   $country=$_POST['country'];
$region=$_POST['region'];
$crop=$_POST['crop'];
$subgroup=$_POST['subgroup'];

    $attribute = mysql_query("select distinct attribute_user from estimate_stderror where country='".$country."' and region='".$region."' and crop='".$crop."' and subgroup='".$subgroup."'");
            while ($att_opt = mysql_fetch_array($attribute)){
            $att_filter = $att_opt[0];
            echo "<option>$att_filter</option>"; 
            }
?>
