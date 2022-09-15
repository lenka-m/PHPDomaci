<?php
    $host="localhost";
    $user="root";
    $password="root";
    $dbName="Filmovi";

    $conn= new mysqli($host,$user,$password,$dbName);

    if($conn->connect_errno){
        exit("Neuspešno povezivanje sa bazom");
    }
?>