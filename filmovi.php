<?php echo "." ?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmovi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
    <link rel="stylesheet" href="css/film.css">

</head>
<body>

    <!-- DODAJ NOVI FILM -->
    <div class="   text-light p-5 m-5 text-center" id="kon1">
    <h1 class="p-4">Zdravo _____</h1>
    <h4 class=" m-5 py-4">Pred tobom se nalaze dostupni filmovi u našem bioskopu. Ukoliko imate nekih novih projekcija ili je došlo do izmena trenutnih slobodno ih možete korigovati</h4>   
        <form action="">
 
            <h6>Unesite naziv filma:</h6>
            <input class="form-control my-3" type="text" id="nazivF" placeholder="npr. Harry Potter">
            <h6>Unesite trajanje filma u minutima:</h6>
            <input class="form-control my-3" type="text" id="nazivF" placeholder="npr. 135">
            <h6>Unesite broj salu gde se film projektuje:</h6>
            <input class="form-control my-3" type="text" id="nazivF" placeholder="npr. 44">
            <input class="form-control my-5 btn btn-success" type="submit" value="Upisi">
        </form>
    </div>

    <!-- DOSTUPNI FILMOVI-->
    <div class="text-light p-5 m-5" id="kon1">
        <h1 class="text-center text-light p-5">Dostupni filmovi:</h1>

        <ul class="col-12 p-5">
            <li class="list-group-item text-center p-3"><h3>Harry Potter</h3></li>
            <li class="list-group-item text-center"><b>Trajanje: </b><i>120min</i></li>
            <li class="list-group-item text-center"><b>Sala: </b><i>44</i></li>
            <li class ="list-group-item p-3">
                <button class="btn btn-warning">Izmeni</button>
                <button class="btn btn-danger">Obriši</button>
            </li>
        </ul>
        <ul class="col-12 p-5">
            <li class="list-group-item text-center p-3"><h3>Harry Potter</h3></li>
            <li class="list-group-item text-center"><b>Trajanje: </b><i>120min</i></li>
            <li class="list-group-item text-center"><b>Sala: </b><i>44</i></li>
            <li class ="list-group-item p-3">
                <button class="btn btn-warning">Izmeni</button>
                <button class="btn btn-danger">Obriši</button>
            </li>
        </ul>
        <ul class="col-12 p-5">
            <li class="list-group-item text-center p-3"><h3>Harry Potter</h3></li>
            <li class="list-group-item text-center"><b>Trajanje: </b><i>120min</i></li>
            <li class="list-group-item text-center"><b>Sala: </b><i>44</i></li>
            <li class ="list-group-item p-3">
                <button class="btn btn-warning">Izmeni</button>
                <button class="btn btn-danger">Obriši</button>
            </li>
        </ul>
    </div>
    <br><br><br>


</body>
</html>
