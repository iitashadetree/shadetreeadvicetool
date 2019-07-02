<?php





        // FOR THE REST OF THE SITE
            $dbhost = "localhost"; // this will ususally be 'localhost', but can sometimes differ  
            $dbname = "shadetre_db"; // the name of the database that you are going to use for this project  
            $dbuser = "shadetre_admin"; // the username that you created, or were given, to access your database  
            $dbpass = "ekshadetree2017db";  // the password that you created, or were given, to access your database   
            
            $con = mysqli_connect($dbhost, $dbuser, $dbpass) or die("MySQLi Error: " . mysqli_error( $con ));  
            mysqli_select_db( $con, $dbname) or die("MySQLi Error: " . mysqli_error( $con ) ); 


        //////// Do not Edit below /////////
        try {
        $dbo = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpass);
        } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
        }






?>
