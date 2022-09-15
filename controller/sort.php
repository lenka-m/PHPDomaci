<?php
    include('../dbBroker.php');

    $upit = "SELECT * FROM 'filmovi' ORDER BY naziv DESC";

    $result = mysqli_query($conn, $upit);
    if(mysqli_fetch_assoc($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            
        }

    }
    else{
        echo 'Nema filmova u bazi.';
    }

?>