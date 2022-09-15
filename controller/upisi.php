<?php

require "../dbBroker.php";
require "../Struktura/Film.php";

session_start();
var_dump($_POST);
/*
$_POST['trajanje'] = 12;
$_POST['sala'] = 3;
$_POST['naziv'] = "Game Of Thrones";
*/
$userID = $_SESSION['userID'];

// id, naziv, trajanje, sala userID;
if(isset($_POST['naziv']) && isset($_POST['trajanje']) && isset($_POST['sala'])){
    
    
    $film = new Film(null,$_POST['naziv'],$_POST['trajanje'],$_POST['sala'],$userID);

    $uspesno = Film::upisi($film, $conn);
    if($uspesno){
        echo "Sakses";
    }
    else echo "Greska";
}

?>
