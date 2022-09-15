<?php
    class Film{
        public $id;
        public $naziv;
        public $trajanje;
        public $sala;
        public $userID;

        public function __construct($id=null, $naziv= null, $trajanje=null, $sala=null, $userID=null){
            $this->id= $id;
            $this->naziv= $naziv;
            $this->trajanje = $trajanje;
            $this->sala= $sala;
            $this->userID= $userID;
        }

        //Ucitavanje filmova  ==================================================================
        
        public static function vratiSve($conn){
            $upit="SELECT * FROM `filmovi`";
            return $conn->query($upit);
        }
        //Upisivanje Novog Filma ==================================================================
        
        public static function upisi($noviFilm, $conn){
            $upit="INSERT INTO `filmovi`(`naziv`, `trajanje`, `sala`, `userID`) VALUES ('$noviFilm->naziv','$noviFilm->trajanje','$noviFilm->sala','$noviFilm->userID')";
            return $conn->query($upit);
            
        }

        //Brisanje Filma ==================================================================

        public static function obrisi($id, $conn){
            $upit = "DELETE FROM `filmovi` WHERE `id` = '$id'";
            return $conn->query($upit);
        }
    }
?>