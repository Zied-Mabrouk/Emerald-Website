<?php

class Menu
{

    private $id;
    private $libelle;
    private $image;
    private $idRestaurant;

    function __construct(string $libelle,string $image,int $idRestaurant)
    {
        $this->image=$image;
        $this->libelle=$libelle;
        $this->idRestaurant=$idRestaurant;
    }

    function getId(): int{return $this->id;}
    function getLibelle() : string{ return $this->libelle; }
    function getImage() : string{ return $this->image; }
    function getIdRestaurant() : int{ return $this->idRestaurant; }
    
    function setLibelle(string $libelle) :void { $this->libelle=$libelle; }
    function setIdRestaurant(int $idRestaurant) :void { $this->idRestaurant=$idRestaurant; }
    function setimage(string $image) :void { $this->image=$image; }

}




?>