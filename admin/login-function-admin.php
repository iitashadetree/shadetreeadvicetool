<?php
session_start();//starting session
$error=''; //variable to store error message
 if (isset($_POST['submit'])) {

                            if (empty($_POST['email']) || empty($_POST['role']) || empty($_POST['password'])) {
                                $error = "Email or Role or Password is invalid"; 
                            } 
                            else 
                            {   
 include ("../config/connection.php"); 
    
    $email = $_POST['email'];
    $role = $_POST['role'];   
    $password = $_POST['password']; 
    $hashp = sha1($password);  
                                
                                //SQL query to fetch information of registerd users and finds user match.
                                $checklogin = mysqli_query( $con, "SELECT * FROM sys_users WHERE email = '".$email."' AND password = '".$hashp."' AND role = '".$role."'");  
                                  if(mysqli_num_rows($checklogin) == 1)  
    {  
        $row = mysqli_fetch_array($checklogin);  
        $email = $row['email'];  
          
        $_SESSION['role'] = $role;  
        $_SESSION['email'] = $email;  
        $_SESSION['LoggedIn'] = 1;  
        
        header ("Location: admin.php");
        
                                } else {
                                    $error = "Email or Role or Password is invalid"; 
                                }
                                
                                                        
                            }
                            

                        }
?>