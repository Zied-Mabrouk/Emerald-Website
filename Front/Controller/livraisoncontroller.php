<?php
require_once "../config.php"; 

class livraisoncontroller{

    function ajouterlivraison($livraison)
    {
        $sql="insert into livraison (id,id_livreur,id_commande,etat) values (:id,:id_livreur,:id_commande,:etat)";

        $db = config::getConnexion(); 

 
        try{
            $req=$db->prepare($sql); 

             $id=$livraison->getId();   
            $id_livreur=$livraison->getidlivreur(); 
            $id_commande=$livraison->getidcommande();
            $etat=$livraison->getetat(); 

            $req->bindValue('id',$id); 
            $req->bindValue('id_livreur',$id_livreur); 
            $req->bindValue('id_commande',$id_commande); 
            $req->bindValue('etat',$etat); 


            $req->execute();


        }

        catch(Exception $e) {
            die('Erreur'.$e->getMessage());

        }
    }
    
    function FindbyId($id)
    {   
        $sql=" SELECT * from livraison where id = '$id' "; 
            $db = config::getConnexion(); 
            try{
                $liste=$db->query($sql); 
                return $liste; 
            }

            catch(Exception $e)
            {
                die('Erreur :'.$e->getMessage());
            }
    }

    


    function FindByCin($id_livreur)
    {
        $sql=" SELECT * from livraison where id_livreur= $id_livreur "; 
            $db = config::getConnexion(); 
            try{
                $liste=$db->query($sql); 
                return $liste; 
            }

            catch(Exception $e)
            {
                die('Erreur :'.$e->getMessage());
            }
    }

    function triparcin()
    {
        $sql = "SELECT * From livraison ORDER BY id_livreur ";
        $db  = Config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function supprimerlivraison($livraison)
    {
        $sql="DELETE from livraison where id= :id"; 
        $db = config::getConnexion(); 
        $req=$db->prepare($sql); 

        $req->bindValue(':id', $_POST["id"]); 

        try {
            $req->execute();
        } catch (Exception $th) {
            die('Erreur' .$th->getMessage());
        }
        
    }

    function affichagelivraison()
    {
        $sql = "SELECT * FROM livraison";
        $db= config::getConnexion();

        try{
            $liste=$db->query($sql); 
            return $liste;

        }
        catch(Exception $e)
        {
            die('Erreur' .$e->getMessage());
        }

    }

}

?>