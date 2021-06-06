<?php
class Categorie{

    private $nom;
    private $image;

    function __construct(string $nom,string $image){

        $this->nom=$nom;
        $this->image=$image;
    }

    function getNom():string{return $this->nom;}
    function getImage():string{return $this->image;}
    function setNom($nom){$this->nom=$nom;}
    function setImage($image){$this->image=$image;}

}



?>