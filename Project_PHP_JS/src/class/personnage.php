<?php

    class Personnage {
        //Propriétés
        private $nom;
        private $classe;
        private $vie;
        private $attaque;
        private $defense;

        //Méthodes
        //Fonction contruct
        public function __construct($nom, $classe, $vie, $attaque, $defense){
            $this->nom = $nom;
            $this->classe = $classe;
            $this->vie = $vie;
            $this->attaque = $attaque;
            $this->defense = $defense;
        }
        //Contient la variable pseudo
        public function nom(){
            return $this->nom;
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
    }

?>