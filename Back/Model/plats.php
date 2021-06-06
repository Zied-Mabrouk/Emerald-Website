<?php

class Plats{

    private $id;
    private $libelle;
    private $categorie;
    private $prix;
    private $description;
    private $imgPlats;

    function __construct(string $libelle,string $categorie,float $prix,string $description,string $imgPlats)
    {
        $this->libelle=$libelle;
        $this->categorie=$categorie;
        $this->prix=$prix;
        $this->description=$description;
        $this->imgPlats=$imgPlats;
    }

    function getId(): int{return $this->id;}
    function getLibelle() : string{ return $this->libelle; }
    function getCategorie() : string{ return $this->categorie; }
    function getPrix() : float{ return $this->prix; }
    function getDescription() : string{ return $this->description; }
    function getImgPlats() : string{ return $this->imgPlats; }

    function setLibelle(string $libelle) :void { $this->libelle=$libelle; }
    function setCategorie(string $categorie) :void { $this->categorie=$categorie; }
    function setPrix(string $prix) :void { $this->prix=$prix; }
    function setDescription(string $description) :void { $this->description=$description; }
    function setImgPlats(string $imgPlats) :void { $this->imgPlats=$imgPlats; }

}




?>