<?php
   include ("../advice/base.php");   
    $tree_sys = mysqli_query( $con, "SELECT distinct Name_english  from tree_library order by Name_english asc");                                        
while ($tree_sysFilter=mysqli_fetch_array($tree_sys)) {
$tree_sysOption = $tree_sysFilter["Name_english"]; 
echo "<option>". 
    $tree_sysOption
    ."</option>"; 
     }                
?>