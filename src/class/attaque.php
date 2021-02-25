<?php

class Attaque {

    //--Propriétés--//
    private $tranche;
    private $sort;
    private $deferlement;
    private $tir;
    private $soin;

    //--Méthodes--//

    /* Méthodes Guerrier */
    //Calcul de la puissance de tranche avec l'attaque du lanceur
    public function tranche($lanceur){
        $this->tranche = $lanceur->attaque() + 10;
        return $this->tranche;
    }
    //Les dégats infligés par l'adversaire s'annulent 
    public function bouclier($degat){
        $degat = 0;
        return $degat;
    }

    /* Méthodes Mage */
    //Calcul de la puissance de sort avec l'attaque du lanceur
    public function sort($lanceur){
        $this->sort = $lanceur->attaque() + 10;
    }
    //Calcul de la puissance de deferlement avec l'attaque du lanceur
    public function deferlement($lanceur){
        $this->deferlement = $lanceur->attaque() + 30;
        return $this->deferlement;
    }

    /* Méthodes Eclaireur */
    //Calcul de la puissance de tir avec l'attaque du lanceur
    public function tir($lanceur){
        $this->tir = $lanceur->attaque() + 10;
    }
    //Les dégats infligés par l'adversaire s'annulent  
    public function esquive($degat){
        $degat = 0;
        return $degat;
    }
    //Soigne le lanceur
    public function soin($lanceur){
        $this->soin = $lanceur->vie() + 30;
    }
}

?>