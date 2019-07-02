<?php
include('../connect.php');


/*
if(isset($_POST['action']) && $_POST['action']=="add") //menangani aksi penambahan data pelanggan
  {  
    
	 $name=$_POST['add_name'];
    // $address=$_POST['add_address'];
    // $exam_no=$_POST['add_exam_no'];   
     //$pattern="/^[A-Z]{2}\d{4}\b/";
     if(($name=="")){
	  echo '{"status":"1"}';
      exit;
     }
	 else{
     $test=mysqli_query($con,"INSERT INTO country(country) VALUES('$name')") or die ("data gagal ditambahakan!");
     echo '{"status":"3"}';
     exit; 
	 }
  }
 */
if(isset($_POST['action'])&& $_POST['action']=="update") //menangani aksi perubahan data pelanggan
  {  
  

    //implode the checkbox values
    $valueChain=implode(',',$_POST['value']);
    $district=implode(',',$_POST['edit_district']);
    $regions=implode(',',$_POST['edit_regions']);
    $country=implode(',',$_POST['edit_country']);
    $typeOfBusiness = implode(',', $_POST['edit_type_of_business']);
    $sector = implode(',', $_POST['edit_sector']);
    $LegalStatus = implode(',', $_POST['edit_legalStatus']);
    $ura_registered = implode(',', $_POST['edit_ura_registered']); 
    $membership = implode(',', $_POST['edit_membership_organisation']);
   //print_r($valueChain);

    $userid=$_POST['edit_user_id'];
    $account=$_POST['edit_user_account'];
    $email=$_POST['edit_user_mail'];
    $username=$_POST['edit_user_name'];
    $status=$_POST['edit_user_registration_status'];
    //$region = $_POST['edit_region'];
    //$country = $_POST['edit_country'];
    

	 
     $test = mysqli_query($con,"
     UPDATE users_registration_table2
     SET 
    `user_account`='$account',
    `user_name`='$username',
    `user_registration_status`='$status',
    `value_chain`='$valueChain',
    `region`='$regions',
    `country`='$country',
    `district`='$district',
    `type_of_business`='$typeOfBusiness',
    `sector`='$sector',
    `membership_organisation`='$membership',
    `legal_status`='$LegalStatus',
    `ura_registered`='$ura_registered'
                where `user_id`='$userid'
    
     ") or die("data gagal di-update!");









     

     exit;
  }
  else if(isset($_POST['action']) && $_POST['action']=="delete") //menangani aksi penghapusan data pelanggan
  {
     $send_id = $_POST['send_id'];
     $test = mysqli_query($con,"select user_mail,user_account from users_registration_table2 WHERE id='$send_id'");
            //create an array
            $vars = array();
             while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $vars[] = $row['user_mail'];
                        $vars[] = $row['user_account'];
                    }


     $email = $vars[0];
     $account = $vars[1];

$receiver = $email ; //hardcorde your email address here - This is the email address that all your feedbacks will be sent to
$sender = 'noreply@opensmeprofile.org'; 
//if(!empty($accountname) && !empty($email) && !empty($password)) {
    //$url = "Click on link this to redirect you to Login page:\n\nhttp://easeagr.com/mymetajua/login.php\n\n";
  //  $body = "Click on this link to redirect you to Login page:\n\nhttps://www.mymetajua.com/login.php\n\nAccountName: {$accountname}\n\nEmail : {$email}\n\nPassword: {$password}";
    
    $bodyContent = '<h1>Your account has been activated</h1>';
    $bodyContent .= '<p>Account name:'.$account.'</p><br/>';
   // $bodyContent .= '<a href="'.ACTIVATION_LINK.'/user_register.php?email='.urlencode($email).'&key='.$token.'">register</a>';
    $Subject = 'Congratulations -  Open SME Profile';
    $send = mail($receiver, $Subject,$bodyContent, "From: {$sender}");
    if ($send) {
        echo 'Account Registration Successful'; //if everything is ok,always return true , else ajax submission won't work
    }
    else{
        echo 'Account Registration failed';
    }


	 
     
     

  //   if(mysqli_affected_rows($con) == 1){ //jika jumlah baris data yang dikenai operasi delete == 1
       echo '{"status":"1"}';
    // }else{
    //   echo '{"status":"0"}';
    // }
     exit;
  }
  ?>