<?php
include "../config.php";
require_once '../Model/compte.php';
class CompteC {
   
    function getLastCategoryAdded($db)
    {
        $sql="SELECT * FROM category ORDER BY idCategorie DESC LIMIT 1";
        $liste = $db->query($sql);
        foreach ($liste as $idCategorie);
            return ($idCategorie["idCategorie"]);
    }


    function recupererCategory($id){
            $sql="SELECT * from category where idCategorie=$id";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();

                $user=$query->fetch();
                return $user;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }




        
function supprimerSelonRang($idCategorie)
{
    $category = $this->recupererCategory($idCategorie);
    
    $sql1="DELETE FROM category WHERE idCategorie= :idCategorie";

    if($category["rang"]== "client")

    $sql="DELETE FROM client WHERE idCategorie= :idCategorie";

    else

    $sql="DELETE FROM restaurant WHERE idCategorie= :idCategorie";
    

    $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req1=$db->prepare($sql1);
        $req->bindValue(':idCategorie',$idCategorie); 
        $req1->bindValue(':idCategorie',$idCategorie); 
        try{
            $req->execute();
            $req1->execute();
        }
        catch (Exception $e){
            die('Erreur:'.$e->getMessage());
        }
}

function searchCatg($idCategorie){

    $sql="SELECT * FROM utilisateur where idCompte=$idCategorie";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}
    function ajouterCompte($Compte){
        $sql="INSERT INTO utilisateur (idCompte,nomCompte,email,passwordd,tel,adresse,dateCreation) 
        VALUES (:idCompte,:nomCompte,:email,:passwordd,:tel,:adresse,:dateCreation)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                'idCompte' => $Compte->getidCompte(),
                'nomCompte' => $Compte->getNomCompte(),
                'email' => $Compte->getEmail(),
                'passwordd' => $Compte->getPasswordd(),
                'tel' => $Compte->getTel(),
                'adresse' => $Compte->getAdresse(),
                'dateCreation' => $Compte->getdateCreation(),
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
    function supprimerCompte($idCompte){
        $sql="DELETE FROM utilisateur WHERE idCompte= :idCompte";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':idCompte',$idCompte);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    
    

    function modifierCompte($Compte, $idCompte){
        $sql="UPDATE utilisateur SET idCompte =:idCompte,nomCompte =:nomCompte,email =:email,passwordd=:passwordd,tel =:tel,adresse =:adresse,dateCreation=:dateCreation  WHERE idCompte = $idCompte";
        try {
            $db = config::getConnexion();
            $req=$db->prepare($sql);
            
            $req->execute([
                'idCompte' => $Compte->getidCompte(),
                'nomCompte' => $Compte->getnomCompte(),
                'email' => $Compte->getemail(),
                'passwordd' => $Compte->getpasswordd(),
                'tel' => $Compte->gettel(),
                'adresse' => $Compte->getadresse(),
                'dateCreation' => $Compte->getdateCreation(),
                
            ]);

            echo $req->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function recherche($search_value)
    {
        $sql="SELECT * FROM utilisateur where idCompte like '$search_value' or nomCompte like '$search_value'or email like '%$search_value%' or passwordd like '%$search_value%' or tel like '%$search_value%' or adresse like '%$search_value%' or dateCreation like '$search_value'";

        //global $db;
        $db =Config::getConnexion();

        try{
            $result=$db->query($sql);

            return $result;

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function search($idCompte)
    {
        $sql = "SELECT * From utilisateur where idCompte like '%$idCompte%' ";
       $db = config::getConnexion();
       try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
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


    function recupererCompte($idCompte){
        $sql="SELECT * from utilisateur where idCompte=$idCompte";
        $db = config::getConnexion();
        try{
        $query=$db->prepare($sql);
        $query->execute();
        
        $user=$query->fetch();
        return $user;
        }
        catch (Exception $e){
        die('Erreur: '.$e->getMessage());
        }
        }

        function triparname()
    {
        $sql = "SElECT * From utilisateur ORDER BY nomCompte ";
        $db  = Config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function triparADRESS()
    {
        $sql = "SElECT * From utilisateur ORDER BY adresse ";
        $db  = Config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    }

?>
