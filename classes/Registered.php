<?php

class Registered extends User
{
    public function modifyUser(Sql $connexion)
    {
        $requete = "UPDATE users SET usermail = :usermail WHERE id_user = :id";
        $connexion->requete($requete);
    }
}