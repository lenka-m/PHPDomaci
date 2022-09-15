<?php

    require "dbBroker.php"; // $conn 

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