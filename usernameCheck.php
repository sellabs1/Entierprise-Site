<?php
    require 'connection.php';

        if(isset($_POST['username']) && !empty($_POST['username'])){

            $db = new Connection();
            $db->db->dbConnect();

            $username=strtolower(mysql_real_escape_string($_POST['username']));
            $query="select * from registration where LOWER(username)='$username'";
            $res=mysql_query($query);
            $count=mysql_num_rows($res);
            
            $HTML='';

            if($count > 0){

                $HTML='user exists';
            }
            else{

                $HTML='';
            }

            echo $HTML;
        }
?>