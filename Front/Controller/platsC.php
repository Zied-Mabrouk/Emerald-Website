<?php

include_once "../config.php";
require_once '../Model/plats.php';


class PlatsC {
		
    function ajouterPlats($Plats){
        $sql="INSERT INTO Plats (Libelle, categorie, prix,description,imgPlats) 
        VALUES (:Libelle,:categorie,:prix,:description,:imgPlats)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                'Libelle' => $Plats->getLibelle(),
                'categorie' => $Plats->getCategorie(),
                'prix' => $Plats->getPrix(),
                'description' => $Plats->getDescription(),
                'imgPlats' => $Plats->getImgPlats()
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }

    function afficherPlats(){
        
        $sql="SELECT * FROM Plats";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }

    function supprimerPlats($id){
        $sql="DELETE FROM Plats WHERE id= :id";
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
    function modifierPlats($Plats, $id){
        try {

            
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE Plats SET 
                    libelle = :libelle,
                    categorie = :categorie, 
                    prix = :prix,
                    description = :descrip,
                    imgPlats = :imgPlats
                WHERE id = :id'
            );
            $query->execute([
                'categorie' => $Plats->getCategorie(),
                'prix' => $Plats->getPrix(),
                'descrip' => $Plats->getDescription(),
                'imgPlats' => $Plats->getImgPlats(),
                'libelle' => $Plats->getLibelle(),
                'id'=> $id
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function recupererPlats($id){
        $sql='SELECT * from Plats where id = "'.$id.'"';
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $Plats=$query->fetch();
            return $Plats;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

   /* function rechercher($input) {
   $sql = "SELECT * from Plats WHERE concat(`libelle`,`categorie`,`prix`,`description`,`imgPlats`) LIKE '%".$input."%'";
   $db = config::getConnexion();
   try { $liste=$db->query($sql); 
    

       return $liste;
   }

   catch (Exception $e){
    die('Erreur: '.$e->getMessage());
        }
    }

    function tri($colonne,$sort)
    {
        $sql = "SELECT * from Plats order by $colonne $sort";
        $db = config::getConnexion();
        try { $liste=$db->query($sql); 
         
     
            return $liste;
        }
     
        catch (Exception $e){
         die('Erreur: '.$e->getMessage());
             }


    }*/

    function rechercheEtTri($input="",$colonne="id",$sort="asc")
{ echo "hedhi $sort";   
    $sql = "SELECT * from Plats WHERE concat(`id`,`libelle`,`categorie`,`prix`,`description`) LIKE '%".$input."%'order by $colonne $sort";
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