<?php
    $db_username = 'crucialadmin';
    $db_password = 'XDsYG2pjvSUtBLfh';
    $db_name = 'CardDatabase';
    $db_host = 'crucial.ict.op.ac.nz';

    //check we have username post var
    if(isset($_POST["username"]))
    {
        //check if its an ajax request, exit if not
        if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
            die();
        }   

            //try connect to db
        $connecDB = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('could not connect to database');
        
        //trim and lowercase username
        $username =  strtolower(trim($_POST["username"])); 
        
        //sanitize username
        $username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
        
        //check username in db
        $results = mysqli_query($connecDB,"SELECT UserId FROM User WHERE username='$username'");
        
        //return total count
        $username_exist = mysqli_num_rows($results); //total records
        
        //if value is more than 0, username is not available
        if($username_exist) {
            echo "Username already exists.";
        }else{
            echo "Username available.";
        }
        
        //close db connection
        mysqli_close($connecDB);
    }

?>