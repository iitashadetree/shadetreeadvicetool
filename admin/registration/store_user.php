<?php
//this is the store_user.php
$error = array();
//if form is submitted, then validate
if(isset($_POST['submit_user_form'])){

if(empty($_POST['user_email'])){
	//echo "email field is empty";
	header("location:error_messages/missing_fields_tem.php");
}
else{
	$user_mail = $_POST['user_email'];
}
if(empty($_POST['user_name'])){
	//echo "user name field is required";
	header("location:error_messages/missing_fields_tem.php");
} else
{
	$user_name = trim($_POST['user_name']);
}
//check if the passwords are empty
if(empty($_POST['user1_password']) || empty($_POST['user2_password']) ){
	//echo "all the password fields are required";
	header("location:error_messages/missing_fields_tem.php");
} 
	else {
		//passwords should match
		if(trim($_POST['user1_password']) == trim($_POST['user2_password'])){
			$user_password =  uniqid(trim($_POST['user1_password']),true);
            $pass_hash = sha1($user_password);
		}
		else
		{
			echo "Passwords donot match please";
		}
	}
//all fields are okay, then we insert into the database
if(isset($user_name) && isset($user_password) && isset($user_mail) ){
		 require_once("../templates/config.php");
		 //check in the table to see if the email is already existing and if not, then insert into the database
		 $pdo = pdo_connect();
		 $sql = "select * from users_registration_table2 where user_mail like '%$user_mail%'";
		 $stmt1 = $pdo->query($sql);
		 $number_of_records = $stmt1->rowcount();
		 if($number_of_records > 0){
		 		//echo "Email account already in use";
		 		//header("location:error_messages/missing_fields_tem.php");
		 		echo "Email account already in use, please";
		 		exit;
		 } else
		 //insert the records into the database 
		 {

		 $status= "partial_registered";

		$db_object = pdo_connect();

		$stmt = $db_object->prepare("insert into users_registration_table2(user_mail,user_name,user_password,user_registration_status)
									 VALUES(:field1,:field2,:field3,:field4)");
		$stmt->execute(array(':field1' => $user_mail, ':field2' => $user_name, ':field3' => $pass_hash, ':field4' => $status));
		 $affected_rows = $stmt->rowCount();
		 //message 
		 //echo $affected_rows." is the number of records which have been inserted";
			 echo "Your details have been saved into the database, Wait for a confirmation email";
			 header("location:error_messages/success_tem.php");

		 }






				 
		






}

}



?>