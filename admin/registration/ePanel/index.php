  <?php
      session_start();
     require("../base.php");
  if(!empty($_SESSION['user_mail'])) {
      $user = $_SESSION['user_mail']; 
?>
<html>
    
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>myMetajua-EditPanel-OpenSMEProfile</title>
<link rel="shortcut icon" href="#" />

<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="css/component.css" />
<link rel="stylesheet" type="text/css" href="css/content.css" />



<link href="../css/kcl_mainEditableExcel.css" type="text/css" rel="stylesheet" media="screen" />
<link rel="stylesheet" type="text/css" media="all" href="css/country.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
<link rel="stylesheet" type="text/css" media="all" href="css/font-awesome.min.css">  

<script src="js/jquery.js"></script>    
<script src='../js/jquery-1.4.4.min.js'></script>
<script type="text/javascript" src="js/pagination_country.js"></script>
<script src="js/modernizr.custom.js"></script> 
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script> 
<script src="js/goback.js"></script> 



 

<?php
     // $smr = mysql_query("select min(today) start, max(today) end from kcl_main_2015");
     //                           while ($smrlrow = mysql_fetch_assoc($smr)){
     //                             $start = $smrlrow['start'];
     //                              $end = $smrlrow['end'];
     //                         } 
 ?>

</head>

<body>

<div id="container" class="container">
<div id="wrapper">
    <div id="header-top">
    <div id="logo">
   
    </div>
    <div id="topMain" style="font:14px;">
        <h3>MyMetajua | Account: <span class="headers"><?php echo "Admin"; ?>
        </span> | User: <span class="headers"><?php echo "Admin";  ?></span> | 
        <a href="../../controllers/logout.php">Sign out</a> </h3>
   
    </div>
    </div>
</div>
<div id="main-wrapper">
    <div id="header">
    <label><h7>OpenSMEProfile users - Editable Panel</h7></label> 
    
    </div>
    <div id="content" style="width: 100%;">
    
       <div id="country-content" class="contentblock">
            
          <div id="formDiv" style="border:1px solid;display:none;">
          <form id="formSearch" >
            Search by Organisation <input type="text" id="fieldSearch" name="search_text" >
            <input type="submit" value="Search">
          </form>
       <div  id="divLoading"></div> 
       <div id="selectDiv">
         <small>
          <select id="pageRecord">
            <option value="5">5</option>
            
            <option selected value="10">10</option>
           
           
          </select><i> Record per Page</i>
         </small>
      </div>
     </div>
     <button onclick="goBack">BACK TO HOME</button>
      
    <div  id="divPageData"></div>
          
          
        </div><!-- @end #home-content -->
          
    </div><!--close content-main -->
                           
    </div><!--closes wrapper-->
    
    </div> 
   
</body>
</html>
<?php
    } else {
   header("location: ../../index.php");
  }
?>