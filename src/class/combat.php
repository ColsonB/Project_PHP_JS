<?php

class Combat {

    //--Propriétés--//
    private $degat;
    private $action;
    private $receveur;

    //--Méthodes--//
    //Fonction contruct
        public function __construct($action, $receveur){
            $this->action = $action;
            $this->receveur = $receveur;
        }
    //Calcul des dégats de la charge en fonction de la défense du personnage
    public function degat(){
        $this->degat = $this->action - $this->receveur->defense();
        return $this->degat;
    }
}

?>