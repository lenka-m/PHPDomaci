<?php
    $host="localhost";
    $user="root";
    $password="root";
    $db="Filmovi";

    $conn= new mysqli($host,$user,$password,$db);

    if($conn->connect_errno){
        exit("Neuspešno povezivanje sa bazom");
    }
?>