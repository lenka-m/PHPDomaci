

<?php  
    echo ".";
    require "dbBroker.php"; // kako bi mogli da prosledimo konekciju sa bazom
    require "Struktura/User.php"; // kako bi mogli da prosledimo objekat user

    session_start();
    if( isset($_POST["uname"]) && isset($_POST["pass"])){
        $korisnik = new User(null,$_POST["uname"],$_POST["pass"]);
        $postoji = User::logInUser($conn, $korisnik);

        if($postoji->num_rows == 1){
            // slucaj kada je pronasao korisnika

            $row = $postoji->fetch_row();
            $_SESSION['userID']= $row[0];
            $korisnik->name=$row[3];
            header("Location: filmovi.php");
            exit();
        }
        else{
            // slucaj kada ne postoji korisnik 
            echo '<script>alert("neuspesno")</script>';
            $korisnik=null;
            header("Location: index.php");
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
    <link rel="stylesheet" href="css/login.css">

</head>
<body>
    <h1 class="text-center text-light p-5">Dobrodošao!</h1>
    <h3 class="text-center text-light">Pred Vama se nalazi sajt za unošenje i izmenu filmskih projekcija.</h3>
    <h2 class="text-center text-light p-5">Kako bi se ulogovali, unesite Vaše korisničko ime i šifru.</h2>


    <div class="container col-lg-4 d-flex justify-content-center opacity-75 bg-dark text-light ">
        <br>
       <form method ="POST" action="">
            <!-- USERNAME -->
           <input class="form-control mt-5" type="text" name="uname" placeholder="Username" required>
            <!-- PASSWORD -->
           <input class= "form-control mt-5" type="password" name="pass" placeholder="Password" required>
           <br><br>
           <!-- login -->
           <button   type="submit" class = "btn btn-primary">Log in</button>
       </form>

    </div>

</body>
</html>
