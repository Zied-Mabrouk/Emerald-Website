<?php
include_once "../config.php";
require_once '../model/categorie.php';
class CategorieC {
		
    function ajouterCategorie($categorie){
        $sql="INSERT INTO categorie (nom,image) 
        VALUES (:nom,:image)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                'nom' => $categorie->getNom(),
                'image' => $categorie->getImage(),
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }

    function afficherCategorie(){
        
        $sql="SELECT * FROM categorie";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }

    function supprimerCategorie($nom){
        $sql="DELETE FROM categorie WHERE nom= :nom";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':nom',$nom);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
   /* function modifierCategorie($categorie, $libelle){
        try {

            
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE categorie SET 
                    categorie = :categorie, 
                    prix = :prix,
                    description = :descrip,
                    imgcategorie = :imgcategorie
                WHERE libelle = :libelle'
            );
            $query->execute([
                'categorie' => $categorie->getCategorie(),
                'prix' => $categorie->getPrix(),
                'descrip' => $categorie->getDescription(),
                'imgcategorie' => $categorie->getImgcategorie(),
                'libelle' => $libelle
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }*/
    function recupererCategorie($nom){
        $sql='SELECT * from categorie where nom = "'.$nom.'"';
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $categorie=$query->fetch();
            return $categorie;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

   /* function rechercher($input) {
   $sql = "SELECT * from categorie WHERE nom LIKE '%".$input."%'";
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
        $sql = "SELECT * from categorie order by nom $sort";
        $db = config::getConnexion();
        try { $liste=$db->query($sql); 
            return $liste;
        }
     
        catch (Exception $e){
         die('Erreur: '.$e->getMessage());
             }
    }
*/

function rechercheEtTri($input="",$sort="asc")
{
    $sql = "SELECT * from categorie WHERE nom LIKE '%".$input."%'order by nom $sort";
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




