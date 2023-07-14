<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname ='ripple2k23';
    if($mycon = @mysqli_connect($host,$user,$pass))
    {
        if(!mysqli_select_db($mycon,$dbname))
        {
            echo 'Could not connect to the DataBase';
        }
    }
    else{
        echo 'Could not connect to the server';
    }
?>