<?php

    require "../dbBroker.php";
    require "../Struktura/Film.php";


    session_start();
    if (isset($_POST["filmID"])){

        $film= new Film($_POST["filmID"]);       
        $uspelo= $film->obrisi($film->id, $conn);
    }
        if($uspelo){
            echo "Sakses";
        }
        else echo "Problem sa bazom";
        

?>