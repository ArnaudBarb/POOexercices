<?php

class Admin extends User
{
    public function deleteUser(Sql $connexion, $email)
    {
        $requete = "DELETE FROM users WHERE usermail = '$email';";
        $connexion->insertion($requete);
    }
}
