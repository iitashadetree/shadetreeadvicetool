<?php
  
//this shoudl handle the sending to the database
//if form button is submitted
define("ACTIVATION_LINK",'C:\wamp\www\IITA\iitaToolFinal2sel_uploaded_30_09_15\admin\registration');


require_once("base.php"); 

   // $name = $_POST['name']; 
    $email = $_POST['email_address'];   
    $token = md5(uniqid(rand(), true)); 
    $time = $_SERVER['REQUEST_TIME'];
   // $accountname = $_POST['accountname']; 
   // $password = $_POST['password'];
  // $hashpass = sha1($password);
  $checkname = mysql_query("SELECT user_mail FROM users_registration_table2 WHERE user_mail = '".$email."'"); 
   if(mysql_num_rows($checkname) == 1)
   {
    $chechErr = "The Email/AccountName is already in use. Please register with another Email or Name";
   }else{
        $registerquery = mysql_query("INSERT INTO open_pending_users (email_address, token, url_timestamp) VALUES('".$email."', '".$token."', '".$time."')");  
        
$receiver = $email ; // hardcorde your email address here - This is the email address that all your feedbacks will be sent to
$sender = 'noreply@opensmeprofile.org'; 
//if(!empty($accountname) && !empty($email) && !empty($password)) {
    //$url = "Click on link this to redirect you to Login page:\n\nhttp://easeagr.com/mymetajua/login.php\n\n";
  //  $body = "Click on this link to redirect you to Login page:\n\nhttps://www.mymetajua.com/login.php\n\nAccountName: {$accountname}\n\nEmail : {$email}\n\nPassword: {$password}";
    
    $bodyContent = '<h1>This is the Open SME Profile user registration email</h1>';
    $bodyContent .= '<p>Click on the link below to register your account from here</p><br/>';
    $bodyContent .= '<a href="'.ACTIVATION_LINK.'/user_register.php?email='.urlencode($email).'&key='.$token.'">register</a>';
    $Subject = 'Sign up with Open SME Profile';
    $send = mail($receiver, $Subject,$bodyContent, "From: {$sender}");
    if ($send) {
        echo 'Account Registration Successful'; //if everything is ok,always return true , else ajax submission won't work
    }
    else{
        echo 'Account Registration failed';
    }

//}
   }


?>