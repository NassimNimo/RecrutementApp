<?php

    // you can edit the information related to the database here

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "project_db";
    $conn = "";

    try{
        $conn = mysqli_connect($db_server,
                            $db_user,
                            $db_pass,
                            $db_name);

    }catch(mysqli_sql_exception){
        echo "Could not connect to DB ";
    }
    
    if($conn){
        echo "You are connected to DB!";
    }
?>