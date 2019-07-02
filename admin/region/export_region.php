<?php

include '../../config/connection.php';
$xls_filename = 'List Of Regions '.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
$DB_TBLName = "region"; // MySQL Table Name
$sql = "Select country,region from $DB_TBLName order by `country` asc, region asc";

            $result=mysqli_query($con,$sql);
// Header info settings
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
 

$sep = "\t";      
      
    
  // Start of printing column names as names of MySQL fields

$fields = mysqli_fetch_fields($result); 
       
      foreach($fields as $fi => $f)  
      { 
     echo preg_replace('/_/',' ',$f->name) . "\t";
        
      } 
    
print("\n");
// End of printing column names
 
// Start while loop to get data
while($row = mysqli_fetch_row($result))
{
  $schema_insert = "";
  for($j=0; $j<mysqli_num_fields($result); $j++)
  {
    if(!isset($row[$j])) {
      $schema_insert .= "NULL".$sep;
    }
    elseif ($row[$j] != "") {
      $schema_insert .= "$row[$j]".$sep;
    }
    else {
      $schema_insert .= "".$sep;
    }
  }
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
} 



?>