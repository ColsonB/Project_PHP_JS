<?php

class Combat {

    //--Propriétés--//
    private $degat;
    private $attaque;
    private $receveur;

    //--Méthodes--//
    //Fonction contruct
        public function __construct($attaque, $receveur){
            $this->attaque = $attaque;
            $this->receveur = $receveur;
        }
    //Calcul des dégats de la charge en fonction de la défense du personnage
    public function degat(){
        $this->degat = $this->attaque - $this->receveur;
        return $this->degat;
    }
}

?>