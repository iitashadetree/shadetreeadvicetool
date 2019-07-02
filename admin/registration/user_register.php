<?php
include_once("../templates/config.php");
include_once("../templates/inc.php");
//this is the activation mail script please
  //validate the email address
  if(!empty($_GET['email']) ){
       $email_address = trim($_GET['email']);
    }
  //validate the key
  if (!empty($_GET['key']) && strlen($_GET['key'])==32) {
    $token = trim($_GET['key']);
    }
  if(isset($email_address) && isset($token)){
  //verify the token
  require_once("../templates/config.php");
  $pdo = pdo_connect();
  $query = $pdo->prepare("select email_address,token,url_timestamp from open_pending_users where email_address = ? and token = ?");
  $query->execute(array($email_address,$token));
  $row = $query->fetch(PDO::FETCH_ASSOC);

  if($row){
    extract($row);
    $tistamp =$url_timestamp;

            //set the expiration time
            $maxtime=86400;   //one day seconds = 60*60*24 hours
            //set the expiration stuff
            if(($_SERVER['REQUEST_TIME']-$tistamp) > $maxtime){
              echo "The token has expired please";
            }
    
          //Delete the token so that it cannot be used again
       $query2 = $pdo->prepare("delete from open_pending_users where email_address = ? and token = ?");
       $query2->execute(array($email_address,$token));    
      

      }//end of if(row)


      else { 
          echo "Invalid token please";
           }
         }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Open SME User Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/form-templates.css">

  <script>
    $(function(){
      //declare the variables and stuff
      password1 = $("#user1_password");
      password2 = $("#user2_password");
      

      showpassword1();
      //show the second password
      showpassword2();

      //validations
      validatefields();
      function validatefields(){
        $("#submit_user_form").click(function(){
            var username = $("#user_name").val();
            var user1password =  $("#user1_password").val();
            var user2password = $("#user2_password").val();
            
            
            //alert(username);

            if(username==''){
              alert("fill in the username field"); 
            }
             if(user1password==''){
              alert("fill in the first password field"); 
            }
             if(user2password==''){
              alert("fill in the second password field"); 
            }
            if(user1password!=user2password){
              alert('the passwords do not match');
            }


            if(username !='' && user1password!='' && user2password!='' && user1password==user2password){
              
               console.log('nice going');
               return true; 
            }

          return false; 

        });
      }
      //show the password1
      function showpassword1(){
          $('.icon').hover(function(){
       password1.attr('type','text');
    },   function(){
       password1.attr('type','password');
    });
      }
      //show the password2
       function showpassword2(){
          $('.icon2').hover(function(){
       password2.attr('type','text');
    },   function(){
       password2.attr('type','password');
    });
      }
      
    });


  </script>
  
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="top_panel">
            <h3>Create an account. It's quick and easy.</h3>            
        </div>
      </div>

    <div class="col-sm-12">
        <div id="message"></div>
    </div>

    <div class="form-body">
        <form role="form" action="store_user.php" method="post" id="user_register_form" class="login-form">
          <div class="row">
              <div class="col-sm-3">
                <label class="fl-right">Username:</label>
              </div>
              <div class="col-sm-7">
                <div class="form-group">
                  <input class="form-control admin_field" name="user_name" id="user_name" type="text" placeholder="Enter your username">
                </div>
              </div>
              <div class="col-sm-2">
              </div> 
          </div> 

          <div class="row">
              <div class="col-sm-3">
                <label class="fl-right">Email:</label>
              </div>
              <div class="col-sm-7">
                <div class="form-group">
                  <input class="form-control admin_field" name="user_email" id="user_email" value="<?php echo $email_address; ?>" 
                  type="text" placeholder="Enter email" readonly>
                </div>
              </div>
              <div class="col-sm-2">
              </div> 
          </div> 

          <div class="row">
              <div class="col-sm-3">
                <label class="fl-right">Password:</label>
              </div>
              <div class="col-sm-7">
                <div class="form-group">
                  <input class="form-control admin_field" name="user1_password" id="user1_password" type="password" placeholder="Enter password">
                </div>
                <div class="icon" style="position:absolute;top:3px;right:-103px;border:1px solid #DDD;padding:2px;height:25px;">show password 1</div>
              </div>
              <div class="col-sm-2">
              </div> 
          </div> 

          <div class="row">
            <div class="col-sm-3">
              <label class="fl-right">Confirm password:</label>
            </div>
            <div class="col-sm-7">
              <div class="form-group">
                <input class="form-control admin_field" name="user2_password" id="user2_password" type="password" placeholder="Confirm password">
              </div>
              <div class="icon2" style="position:absolute;top:6px;right:-103px;border:1px solid #DDD;padding:2px;height:25px;">show password 2</div>
            </div>
            <div class="col-sm-2">
            </div> 
          </div>

          <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-7">
              <div>
               <input type="submit" value="submit" id="submit_user_form" name="submit_user_form" class="btn btn-primary"/>
              </div>
            </div>
            <div class="col-sm-2">

            </div> 
          </div>

        </form>
    </div>
  </div>  
</div>
</body>
</html>

