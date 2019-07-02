<?php
   include ("../advice/base.php");
$attribute_sys = mysqli_query( $con, "select distinct attribute from attributes order by attribute asc"); 

while ($attribute_sysFilter=mysqli_fetch_array($attribute_sys)) {
$attribute_sysOption = $attribute_sysFilter["attribute"]; 
echo "<option>". 
$attribute_sysOption
."</option>"; 
 }               
?>
