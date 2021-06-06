<?php
class Compte {
    private  $idCompte = null;
    private  $nomCompte = null;
    private  $email = null;
    private  $passwordd = null;
    private  $tel = null;
    private  $adresse = null;
    private  $dateCreation = null;
    
    
    function __construct(string $idCompte,string $nomCompte,string $email, string $passwordd, int $tel, string $adresse, string $dateCreation){
    $this->idCompte= $idCompte;
    $this->nomCompte= $nomCompte;
    $this->email= $email;
    $this->passwordd= $passwordd;
    $this->tel= $tel;
    $this->adresse= $adresse;
    $this->dateCreation= $dateCreation;
    
    }
     function getidCompte(): string{
        return $this->idCompte; 
        }
        
     function setidCompte (string $idCompte): void{
        $this->idCompte = $idCompte;
        }
     function getNomCompte (): string{
    return $this->nomCompte;
    }
    
     function setNomCompte (string $nomCompte): void{
    $this->nomCompte = $nomCompte;
    }
   
     function getEmail (): string{
    return $this->email;
    }
    
     function setEmail (string $email): void{
    $this->email = $email;
    }
     function getPasswordd (): string{
        return $this->passwordd;
        }
        
         function setPasswordd (string $passwordd): void{
        $this->passwordd = $passwordd;
        }
     function getTel (): int{
    return $this->tel;
    }
    
     function setTel (int $tel): void{
    $this->tel = $tel;
    }
    
     function getAdresse (): string{
    return $this->adresse ;
    }
    
     function setAdresse (string $adresse): void{
    $this->adresse = $adresse;
    }

     function getdateCreation (): string{
        return $this->dateCreation;
        }
        
         function setdateCreation (string $dateCreation): void{
        $this->dateCreation = $dateCreation;
        }

    }

?>