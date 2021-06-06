<?php
include_once "../config.php";
require_once '../model/menu.php';
class MenuC {
		
    function ajouterMenu($menu){
        $sql="INSERT INTO menu (libelle,image,id_restaurant) 
        VALUES (:libelle,:image,:id_restaurant)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                'libelle' => $menu->getLibelle(),
                'image' => $menu->getImage(),
                'id_restaurant' => $menu->getIdRestaurant(),
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }

    function afficherMenu(){
  
            $sql="SELECT * FROM menu";
       
            $db = config::getConnexion();
            try{
            $liste = $db->query($sql);
           
            return $liste;
            }
            catch (Exception $e){
            die('Erreur: '.$e->getMessage());
            }	
    }

    function supprimerMenu($id){
        $sql="DELETE FROM menu WHERE id= :id";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id',$id);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


function menuRestaurant($idRestaurant)
{ 
    $sql="SELECT * FROM menu  where id_restaurant = $idRestaurant ;";

    $db = config::getConnexion();
    try{
    $liste = $db->query($sql);

    return $liste;
    }
    catch (Exception $e){
    die('Erreur: '.$e->getMessage());
    }
}

    
    function modifierMenu($menu,$id){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE menu SET 
                    libelle = :libelle, 
                    image = :img,
                    id_restaurant = :id_restaurant
                WHERE id =:id'
            );
           
            $query->execute([
                'libelle' =>$menu->getLibelle(),
               'img' => $menu->getImage(),
                'id_restaurant' => $menu->getIdRestaurant(),
                'id'=> $id
                
            ]);
           
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
    
        }
    }
    function recupererMenu($id){
        $sql='SELECT * from menu where id = "'.$id.'"';
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $menu=$query->fetch();
            return $menu;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

   /* function rechercher($input) {
   $sql = "SELECT * from menu WHERE nom LIKE '%".$input."%'";
   $db = config::getConnexion();
   try { 
       $liste=$db->query($sql); 
    
       return $liste;
   }

   catch (Exception $e){
    die('Erreur: '.$e->getMessage());
        }
    }

    function tri($sort)
    {
        $sql = "SELECT * from menu order by nom $sort";
        $db = config::getConnexion();
        try { $liste=$db->query($sql); 
            return $liste;
        }
     
        catch (Exception $e){
         die('Erreur: '.$e->getMessage());
             }
    }
*/

function rechercheEtTri($input="",$colonne="id",$sort="asc")
{
    $sql = "SELECT * from menu WHERE concat(`id`,`libelle`,`id_restaurant`) LIKE '%".$input."%'order by $colonne $sort";
    $db = config::getConnexion();
    try { 
        $liste=$db->query($sql); 
     
        return $liste;
    }
 
    catch (Exception $e){
     die('Erreur: '.$e->getMessage());
         }

}

}



?>