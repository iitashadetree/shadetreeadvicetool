<?php
//connect to the database 
//$connect = mysqli_connect("localhost","metajua","metajua"); 
include('../../../../config/connection.php');

 
if (isset($_FILES['csv']['size']) > 0) { 
 
    //get the csv file 
    $file = $_FILES['csv']['tmp_name']; 
    
    $country = $_POST['country']; 
    $region = $_POST['region']; 
    $crop = $_POST['crop'];
    $BatchID=$_POST['BatchID']; 
  
    $handle = fopen($file,"r"); 
    $name = $_FILES['csv']['name'];
    //loop through the csv file and insert into database 
    do { 
        if (isset($data[0])) { 
		//$exist = mysqli_num_rows(mysqli_query( $con, "SELECT BatchID FROM estimate_stderror_test2 WHERE BatchID = '0000'"));
		//if($exist == 0 ) {
            mysqli_query( $con, "INSERT INTO estimate_stderror (id_score,country,region,crop,BatchID,subgroup,attribute_user,attribute_system,tree_user,tree_system,estimate,qStdError) VALUES 
                ( 
                    '".addslashes(trim($data[0],'"'))."',                     
                    '$country',
                    '$region',
                    '$crop',
                    '$BatchID',
                    '".addslashes(trim($data[1],'"'))."',
					'".addslashes(trim($data[2],'"'))."',
                    '".addslashes(trim($data[3],'"'))."',
                    #'attribute_system',                    
                    '".addslashes(trim($data[4],'"'))."',
                    '".addslashes(trim($data[5],'"'))."',
                    #'tree_system',                    
                    '".addslashes(trim($data[6],'"'))."',
                    '".addslashes(trim($data[7],'"'))."'
                ) 
            "); 
	//}
        } 
    } while ($data = fgetcsv($handle,1000,",","'"));     // 
 
    //redirect 
	//echo '<script> window.loaction.href="../index.php?result=1" </script>';
  header("Location: ../index.php");
     die; 

} 

?> 
 
