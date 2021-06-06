<?php
include_once "../config.php";
require_once '../Model/category.php';
class CategoryC {
   
    function ajouterCategory($Category){
        $sql="INSERT INTO category (rang) 
        VALUES (:rang)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                'rang' => $Category->getRang(),
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }

    function afficherCompte(){
			
        $sql="SELECT * FROM utilisateur";
        $db = config::getConnexion ();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
      }

      






    }

?>
