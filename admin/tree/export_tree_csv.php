
<?php

 session_start();  
 // output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Tree library.csv');
// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');
// output the column headings

fputcsv($output, array(
'id',
'image',
'Latin genus',
'Latin family',
'Latin species',
'Subspecies',
'Name english',
'Name luganda',
'French Name',
'Swahili Name',
'size',
'growth rate',
'Years to mature',
'grows in sun',
'grows in shade',
'grows in any soil',
'drought resistant',
'provides firewood',
'provides charcoal',
'provides food',
'provides mulch',
'Construction provides poles',
'Construction provides beams',
'Construction timber quality',
'Construction type',
'Construction durable outdoors',
'Construction durable in water',
'Natural regeneration',
'Stem cuttings success rate',
'Remarks',
'User comments',
'prota 4 u',
'Agro forest tree',
'FAO',
'Fig web',
'Plantz africa'

));

// fetch the data
include '../../config/connection.php';

$rows = mysqli_query( $con, "select *  from tree_library");
// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rows)) fputcsv($output, $row);
?>
