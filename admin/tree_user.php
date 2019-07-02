<?php
   include ("base.php");
    $tree_user = mysqli_query( $con, "SELECT distinct Name_english  from tree_library order by Name_english asc");                                        
while ($tree_userFilter=mysqli_fetch_array($tree_user)) {
$tree_userOption = $tree_userFilter["Name_english"]; 
echo "<option>". 
    $tree_userOption
    ."</option>"; 
     }                
?>