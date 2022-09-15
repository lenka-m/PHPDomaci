<?php

require "../dbBroker.php";
require "../Struktura/Film.php";

session_start();


$userID = $_SESSION['userID'];

// id, naziv, trajanje, sala userID;
if(isset($_POST['id']) && isset($_POST['trajanje']) && isset($_POST['sala'])){
   
    $id = $_POST['id'];
    $naziv = $_POST['naziv'];
    $trajanje = $_POST['trajanje'];
    $sala = $_POST['sala'];

    $upit = "UPDATE filmovi SET naziv = '$naziv', trajanje = '$trajanje', sala = '$sala' WHERE id='$id'";
    $result = mysqli_query($conn, $upit);

    if($result){
        echo "Sakses";
    }
    else echo "Greska";
}

?>
