<?php
include('login-function-admin.php');//includes login script
?>
<html>
<head>
<title>IITA Shade tree - Login</title>
<link rel="shortcut icon" href="img/meta-ico.png" />
<link rel="stylesheet" type="text/css" href="css/loginstyle.css">
</head>
<body>
<div id="login">
<div id="loginLogo"><a href="../index.php"><img src="images/iita_tool_logo4.png" width="462px" height="60px" alt=""></a></div>
<p>&nbsp;</p>
<h2> 'Login to your Account'</h2>
<form action="login.php" method="post">
<label>Email  :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="email" id="email" placeholder="email"/><br /> <br />
<label>Type/Role : </label>
<select id="role" name="role">
<option value="Read">Read</option>
<option value="Edit">Edit</option>
<option value="Admin">Admin</option>
</select>
<br /> <br />
<label>Password  :</label>&nbsp;&nbsp;
<input type="password" name="password" id="password" placeholder="**********"/><br/>
<span><?php echo $error; ?></span><br>
<input type="submit" value="Sign In " name="submit"/><br />
<a href="passReq.php">Forgot your credentials?</a>

</form>
</div>




</body>
</html>
