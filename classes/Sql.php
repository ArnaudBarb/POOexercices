<?php

class Sql
{
//encapsulation = définir si une classe est public, protected ou private

    private string $serverName = "localhost";
    private string $userName = "root";
    private string $database = "poo";
    private string $userPassword = "";
    private object $connexion;

    public function __construct()
    {
        try
        {
            $this->connexion = new PDO("mysql:host=$this->serverName;
            dbname=$this->database", $this->userName, $this->userPassword);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        catch(PDOException $e)
        {
            die("Erreur :" . $e->getMessage);
        }
        //PDOexception est une classe et le $e est l'instanciation d'objet = injection de dépendance
        //l'importance des injections de dépendance tient dans l'absence de couplage (aka de dépendance 
        //de classes. C'est pour cette raison que l'on sépare le css de l'html par exemple)
    }

    public function insertion($requete)
    {
        try
        {
            $this->connexion->beginTransaction();
            $this->connexion->exec($requete);
            $this->connexion->commit();
        }
        catch(PDOException $e)
        {
            $this->connexion->rollback();
            die("Erreur :" . $e->getMessage);
        }
    }

    public function __destruct()
    {
        unset($this->connexion);
    }
}