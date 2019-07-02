
<?php

 session_start();  
 // output headers so that the file is downloaded rather than displayed

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Crops.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');
// output the column headings

fputcsv($output, array(
'id crop',
'crop'
));

// fetch the data
include '../../config/connection.php';

$rows = mysqli_query( $con, "select *  from crop");
// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rows)) fputcsv($output, $row);
?>
