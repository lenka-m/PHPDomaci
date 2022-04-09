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
        
        public static function vratiSve($conn){
            $upit="SELECT * FROM `Film`";
            return $conn->query($upit);
        }
    }
?>