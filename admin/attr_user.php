<?php
   include ("../advice/base.php");
    $attribute_user = mysql_query("select distinct attribute_user from estimate_stderror where attribute_user not in ('','Attribute_user') order by attribute_user asc");                                        
while ($attribute_userFilter=mysql_fetch_array($attribute_user)) {
$attribute_userOption = $attribute_userFilter["attribute_user"]; 
echo "<option>". 
    $attribute_userOption
    ."</option>"; 
     }                
?>