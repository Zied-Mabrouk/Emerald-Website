<?php 

class livreur{

    private $id; 
    private $cin; 
    private $nom; 
    private $prenom; 
    private $numero; 
    private $email;


    function __construct($cin, $nom, $prenom, $email, $numero) // this is wrong, so idiot
    {
        $this->cin=$cin; 
        $this->nom=$nom; 
        $this->prenom=$prenom; 
        $this->email=$email; 
        $this->numero=$numero;

    }

    function getId()
    {
        return $this->id; 
    }
    function getCin()
    {
        return $this->cin;
    }
    function getNom()
    {
        return $this->nom; 
    }
    function getPrenom()
    {
        return $this->prenom; 
    }
    function getEmail()
    {
        return $this->email;
    }
    function getNumero()
    {
        return $this->numero;
    }
    function setNom()
    {
        $this->nom=$nom;
    }
    function setPrenom()
    {
        $this->prenom=$prenom;
    }
    function setEmail()
    {
        $this->email=$email;
    }
}



?>