<?php
// https://www.w3schools.com/howto/howto_js_vertical_tabs.asp
   include ("../config/connection.php");
   $country=$_POST['country'];
$region=$_POST['region'];
$crop=$_POST['crop'];
$subgroup=$_POST['subgroup'];

    $attribute = mysqli_query( $con, "select distinct attribute_user from estimate_stderror where country='".$country."' and region='".$region."' and crop='".$crop."' and subgroup='".$subgroup."'");
            while ($att_opt = mysqli_fetch_array($attribute)){
            $att_filter = $att_opt[0];
            echo "<option>$att_filter</option>"; 
            }
?>
