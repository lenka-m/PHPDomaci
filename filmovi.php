<?php echo ".";

    require("dbBroker.php");
    require("Struktura/Film.php");

    session_start();

    $userID = $_SESSION['userID'];
    $userName = $_SESSION['name'];

?>



<!DOCTYPE html>
<html lang="en">
<head>

    <title>Filmovi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <link rel="stylesheet" href="css/film.css">
    <script src = "script.js"></script>
    
    
</head>

<body>
    <a class="btn btn-danger" href="logout.php">Log out</a>
    <!-- DODAJ NOVI FILM -->
    <div class="text-light p-5 m-5 text-center" id="kon1">
        <h1 class="p-4">Zdravo <?= $userName ?></h1>


        <h4 class=" m-5 py-4">Pred tobom se nalaze dostupni filmovi u našem bioskopu. Ukoliko imate nekih novih projekcija ili je došlo do izmena trenutnih slobodno ih možete korigovati</h4>   
        <form method = "POST"  >
            <h6>Unesite naziv filma:</h6>
                <input class="form-control my-3" type="text" id="naziv" required>
            <h6>Unesite trajanje filma u minutima:</h6>
                <input class="form-control my-3" type="text" id="trajanje" required>
            <h6>Unesite broj salu gde se film projektuje:</h6>
                <input class="form-control my-3" type="text" id="sala"  required>
            <button id = "btnDodaj" class = "btn btn-success">Dodaj film</button>     
        </form>
    </div>

    <!-- Pretraga -->
    <div class="text-light p-5 m-5 text-center" id="kon1">
    <input type="text" class = "form-control" id ="search" placeholder = "Pretrazi bazu:">
        <div id="result"></div>
        
    </div>

    <!-- DOSTUPNI FILMOVI-->
    
    <div class="text-light p-5 m-5" id="kon1">
        <h1 class="text-center text-light p-5">Dostupni filmovi:</h1>
        
        <table>

            <thead class="thead-dark">
                <th>Naziv <a class="sort" id="NazivSort"> ↑ </a> </th>
                <th>Trajanje</th>
                <th>Sala</th>  
                <th></th>
                <th></th>
            </thead>
            <tbody>
                
            <?php // PHP TABELA SA UCITAVANJEM FILMOVA      
            $kolekcijaFilmova = Film::vratiSve($conn);
            if($kolekcijaFilmova==null){
                echo "Doslo je do greske";
                exit();
            }
            else if($kolekcijaFilmova->num_rows == 0){
                echo "Trenutno nema filmova na repertoaru";
            }
            else{
                while ($row = $kolekcijaFilmova->fetch_array()):
        ?>
                <tr id = "<?=$row[0] ?>">
                    <td scope = "row" data-target = "naziv"><?= $row[1] ?></td>
                    <td data-target = "trajanje"><?= $row[2] ?></td>
                    <td data-target = "sala"><?= $row[3] ?></td>
                    <td>
                        <button  class = "btn btn-danger btnObrisi" id = "btnBrisi" data-filmID = "<?=$row[0] ?>" >Delete </button>
                    </td>
                    <td>
                        <button type="button" data-role = "update" class=" btnEdit btn btn-info btn-lg btn-warning" data-toggle="modal" data-target="#myModal" data-filmID = "<?=$row[0] ?>" >Edit</button>
                    </td>

                </tr>
                <?php 
            endwhile; 
            }
        ?>
            </tbody>
            
        </table>
        <script> 
            $(".btnEdit").click(function(e){
                e.preventDefault();
                let filmID = $(this).attr('data-filmID');
                let naziv = $('#'+filmID).children('td[data-target = naziv>]').text();
                console.log(naziv);
                console.log(filmID);
            });
        </script>

    </div>

 
 <!-- Modal -->
    <div class="modal " id="myModal" role="dialog">
        <div class="modal-dialog">
    
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                    </div>
                    <div class="modal-body">
                        <label> Naziv:</label><br>
                        <input type="text" value = "<?$row[1]?>" id="inputNaziv"><br>
                        <label> Trajanje:</label><br>
                        <input type="text" id="inputTrajanje"><br>
                        <label> Sala:</label><br>
                        <input type="text" id="inputSala"><br>
                    </div>
                    <div class="modal-footer">
                        <button class = "btn btn-success" id ="btnSaveEdit"> Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
      
        </div>
    </div>     
    

</body>
</html>
