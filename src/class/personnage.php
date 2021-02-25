<?php

    class Personnage {
        //Propriétés
        private $pseudo;
        private $classe;
        private $attaque;
        private $defense;
        private $vitesse;
        private $vie;

        //Méthodes
        //Fonction contruct
        public function __construct($pseudo, $classe, $vie, $attaque, $defense, $vitesse){
            $this->pseudo = $pseudo;
            $this->classe = $classe;
            $this->vie = $vie;
            $this->attaque = $attaque;
            $this->defense = $defense;
            $this->vitesse = $vitesse;
        }
        //Contient la variable pseudo
        public function pseudo(){
            return $this->pseudo;
        }
        //Contient la variable classe
        public function classe(){
            return $this->classe;
        }
        //Contient la variable vie
        public function vie(){
            return $this->vie;
        }
        //Contient la variable attaque
        public function attaque(){
            return $this->attaque;
        }
        //Contient la variable defense
        public function defense(){
            return $this->defense;
        }
        //Contient la variable vitesse
        public function vitesse(){
            return $this->vitesse;
        }
    }

?>