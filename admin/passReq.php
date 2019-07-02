<?php 
require_once ("base.php"); //connects to the database
$error='';
$sucss='';
if (isset($_POST['email'])){
    $email = $_POST['email'];
    $checkemail= mysqli_query( $con, "SELECT * FROM registereduser WHERE email = '".$email."'");
    
    // If the count is equal to one, we will send message other wise display an error message.
    if(mysqli_num_rows($checkemail) == 1) 
    {
         while ($row = mysqli_fetch_assoc($checkemail))
         {
                $email = $row['email'];
                $accountname = $row['accountname'];
                $name = $row['name'];
                $sender = 'noreply@metajua.com'; 
                $receiver = $email; 
                $mailbody = "Click on this link:\n\n www.mymetajua.com/Account_Reg.php \n\n And Enetr the following credentials into the Registration FORM.\n\nAccountName:{$accountname}\n\nEmail :{$email}\n\nName:{$name}";
              $sentmail = mail($receiver, 'myMetajua Account - Request', $mailbody, "From: {$sender}");
              if ($sentmail) {
              $sucss = 'A verification link has been sent your Email '; //if everything is ok,always return true , else ajax submission won't work
            }else
                {
                    echo 'myMetajua Account Credential Request failed';
                }
                
         }
    }
    else
    {
        $error = 'Can not find your email in our database';
    }
        
     
}
?>
 <!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="img/favicon_0.gif" />
<link rel="stylesheet" type="text/css" href="style/passReq.css" />
<title>Forgot Your credentials - myMetajua</title>
</head>
<body>

<div class="register-form">
<img src="img/Metajua1.png" width="120px" height="40px" alt="">
<h1>myMetajua Account credential Request FORM</h1>
<form action="passReq.php" method="POST">
    <p><label>Email : </label>
    <input id="email" type="text" name="email" placeholder="email" /></p>
     <span class="notification">Enter the Email used when creating Account </span><br>
    <input class="btn register" type="submit" name="submit" value="Request" /><br>
     <span class='msg'><?php echo $error; ?></span><br>
     <span class='msg'><?php echo $sucss; ?></span><br>
    </form>
        
</div>

</body>
</html>