<?php

    require "dbBroker.php";

    session_start();

    if (isset ($_SESSION['userID'])){
        header("Location: filmovi.php");
        exit();
    }
    else{
        header("Location: login.php");
        exit();
    }


    


?>