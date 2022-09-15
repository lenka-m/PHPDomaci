<?php

include ('../dbBroker.php');

if(isset($_POST['input'])){
    $input = $_POST['input'];
    $upit = "SELECT * FROM `filmovi` WHERE naziv LIKE '{$input}%'";
    $result = mysqli_query($conn, $upit);
    if(mysqli_num_rows($result)>0){

      while($row = mysqli_fetch_assoc($result)){
        ?>

        <h5 style = "background-color:white; color:black; margin:10px;"><?= $row['naziv'] ?></h5>
        
        <?php
    }
    } 
    else{
       echo "<h6> Nema filmova koje ste trazili</h6>";
    }
}

?>