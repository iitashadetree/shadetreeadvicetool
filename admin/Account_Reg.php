<?php
  require_once ("base.php"); //connects to the database
  $error='';
  $senderr='';
  $sucss='';

    $email = $_POST['email'];    
    $accountname = $_POST['account']; 
    $password = $_POST['newpassword'];
    $password2 = $_POST['passwordConf'];
   $hashpass = sha1($password);
  $checkacc = mysql_query("SELECT * FROM registereduser WHERE accountname = '".$accountname."' and email = '".$email."'"); 
   if(mysql_num_rows($checkacc) == 1)
   {
    $sqlupdate = mysql_query("UPDATE registereduser SET password='".$hashpass."' WHERE accountname = '".$accountname."' and email = '".$email."'");
     $receiver = $email ; // hardcorde your email address here - This is the email address that all your feedbacks will be sent to
$sender = 'noreply@metajua.com'; 
if(!empty($accountname) && !empty($email) && !empty($password)) {
    //$url = "Click on link this to redirect you to Login page:\n\nhttp://easeagr.com/mymetajua/login.php\n\n";
    $body = "Click on this link to redirect you to Login page:\n\n www.mymetajua.com/login.php\n\nAccountName:{$accountname}\n\nEmail :{$email}\n\nPassword:{$password}";
    $send = mail($receiver, 'myMetajua Account',$body, "From: {$sender}");
    if ($send) {
      $sucss = 'Account Registration and Credentail mailing Successful. Check your email'; //if everything is ok,always return true , else ajax submission won't work
    }
    else{
         $senderr = 'Account Credentials Send failure';
    }

}
   }else{
        $error = 'Account Registration failed. Check your the Account/Email value entered';
        
   }
       
?> 
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="img/favicon_0.gif" />
<link rel="stylesheet" type="text/css" href="style/passReq.css" />
<title>Forgot Your credentials-myMetajua</title>
</head>
<body>


<div class="register-form">
<img src="img/Metajua1.png" width="120px" height="40px" alt="">
<h1>myMetajua Account Registration FORM</h1>
<h2>Please Account and Email field values should be the same as to those sent to your email</h2>
<form action="Account_Reg.php" method="POST">
    <label>Account: </label><br>
    <input id="account" type="text" name="account" placeholder="account" /><br><br>
    <label>Email: </label><br>
    <input id="email" type="text" name="email" placeholder="email" /><br><br>
    <label>New Password: </label><br>
    <input id="newpassword" type="password" name="newpassword" placeholder="*************" /><br><br>
    <label>Confirm Password:</label><br>
     <input id="passwordConf" type="password" name="passwordConf" placeholder="************" /><br><br>
    <input class="btn register" type="submit" name="submit" value="Register" />
    <span class='msg'><?php echo $error; ?></span><br>
     <span class='msg'><?php echo $sucss; ?></span><br>
        <span class='msg'><?php echo $senderr; ?></span><br>
    </form>
</div>

</body>
</html>