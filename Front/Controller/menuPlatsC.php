<?php
include_once "../config.php";
require_once '../model/menuPlats.php';

class MenuPlatsC{


function ajouterMenu($menuPlats){
        $sql="INSERT INTO menu_plats (id_menu,id_plats) 
        VALUES (:idMenu,:idPlats)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                'idMenu' => $menuPlats->getIdMenu(),
                'idPlats' => $menuPlats->getIdPlats()
                
            ]);         
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }           
    }

function afficherMenuPlats($idMenu){
    $sql="SELECT
    plats.id,
    plats.libelle,
    plats.categorie,
    plats.prix,
    plats.description,
    plats.imgPlats
  FROM menu
  JOIN menu_plats
    ON menu.id = menu_plats.id_menu
  JOIN plats
    ON menu_plats.id_plats = plats.id
    WHERE menu.id = $idMenu;";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }   
    
}

function supprimerMenuPlats($idPlats){

    $sql="DELETE FROM menu_plats WHERE id_plats= :id";
    $db = config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(':id',$idPlats);
    try{
        $req->execute();
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }



}



}


?>