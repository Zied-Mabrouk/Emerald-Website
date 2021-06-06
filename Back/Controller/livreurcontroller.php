<?php
require_once "config.php";


class livreurcontroller{

    function ajouterlivreur($livreur)
    {
        $sql="insert into livreur (cin,nom,prenom,email,numero) values (:cin,:nom,:prenom,:email,:numero)";

        $db = config::getConnexion(); 

 
        try{
            $req=$db->prepare($sql); 

             $cin=$livreur->getCin();   
            $nom=$livreur->getNom(); 
            $prenom=$livreur->getPrenom();
            $numero=$livreur->getNumero(); 
            $email=$livreur->getEmail(); 

            $req->bindValue('cin',$cin); 
            $req->bindValue('nom',$nom); 
            $req->bindValue('prenom',$prenom); 
            $req->bindValue('numero',$numero); 
            $req->bindValue('email',$email); 


            $req->execute();


        }

        catch(Exception $e) {
            die('Erreur'.$e->getMessage());

        }
    }

    function afficherlivreur()
    {
        $sql = "SELECT * FROM livreur";
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

    function modifierlivreur($categorie, $cin,$id)
    {
        $sql = "UPDATE livreur SET nom =:nom, prenom =:prenom, numero =:numero, email =:email where cin = '$cin'";
            $db = config::getConnexion(); 

            try {
                $id=$livreur->getId();
                $cin=$livreur->getCin(); 
                $nom=$livreur->getNom(); 
                $prenom=$livreur->getPrenom();
                $numero=$livreur->getNumero(); 
                $email=$livreur->getEmail(); 

                $datas = array(':id'=>$id,':cin'=>$cin, ':nom'=>$nom, ':prenom'=>$prenom, 'numero'=>$numero, 'email'=>$email );
                $req->binValue(':cin',$cin);
                $req->binValue(':id',$id);

                $req->binValue(':nom',$nom);
                $req->binValue(':prenom',$prenom);
                $req->binValue(':numero',$numero);
                $req->binValue(':email',$email);




            


            } catch( Exception $e) {
                echo "Erreur ".$e->getMessage(); 
                echo "datas: "; 
                print_r($datas);
            }

    }

    function supprimerlivreur($categorie)
    {
        $sql="DELETE from livreur where id= :id"; 
        $db = config::getConnexion(); 
        $req=$db->prepare($sql); 

        $req->bindValue(':id', $_POST["id"]); 

        try {
            $req->execute();
        } catch (Exception $th) {
            die('Erreur' .$th->getMessage());
        }
        
    }

    function FindByCin($id)
    {
        $sql=" SELECT * from livreur where id= $id "; 
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
        $sql = "SElECT * From livreur ORDER BY cin ";
        $db  = Config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    
    function search($cin)
    {
        $sql = "SELECT * From livreur WHERE cin = $cin ";
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