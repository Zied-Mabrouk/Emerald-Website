<?php
class livraison{

    private $id; 
    private $id_livreur; 
    private $id_commande; 
    private $etat;


    function __construct($id_livreur,$id_commande,$etat)
    {

             $this->id_livreur=$id_livreur; 
        
             $this->id_commande=$id_commande;     
             $this->etat=$etat; 


    }


    function getId()
    {
        return $this->id;
    }
    function getidlivreur()
    {
        return $this->id_livreur;

    }
    function getidcommande()
    {
        return $this->id_commande;
    }

    function getetat()
    {
        return $this->etat;
    }
    function setidlivreur()
    {
        $this->id_livreur=$id_livreur;
    }
    function setidcommande()
    {
        $this->id_commande=$id_commande;
    }

    function setEtat()
    {
        $this->etat=$etat;
    }

}


?>