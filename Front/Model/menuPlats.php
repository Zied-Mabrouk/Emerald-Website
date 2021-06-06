<?php

class MenuPlats
{

    private $idMenu;
    private $idPlats;


    function __construct(int $idMenu,int $idPlats)
    {
        $this->idMenu=$idMenu;
        $this->idPlats=$idPlats;
    }

    function getIdMenu(): int{return $this->idMenu;}
    function getIdPlats() : string{ return $this->idPlats; }
    
    function setIdMenu(string $idMenu) :void { $this->idMenu=$idMenu; }
    function setIdPlats(int $idPlats) :void { $this->idPlats=$idPlats; }

}




?>