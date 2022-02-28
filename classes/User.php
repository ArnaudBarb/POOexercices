<?php

class User
{
    private string $userName;
    private string $userFirstname;
    private string $userMail;
    private string $DateOfBirth;
    private int $userRole;

    //création d'un getter afin de récupérer les infos préenregistrées
    public function getNomUser(): string|bool
    {
        // if(mb_strlen($this->userName) > 0) test impossible sans données préalables

        // if (isset($this->userName))
        //     return $this->userName;
        // else
        //     return false;
        //même chose que les ifs précédents mais en ternaire
        return isset($this->userName) ? $this->userName : false;
    }
    public function setNomUser(string $name): void
    {
        $this->userName = $name;
    }
    public function getFirstnameUser(): string|bool
    {
        return isset($this->userFirstname) ? $this->userFirstname : false;
    }
    public function setFirstnameUser(string $userFirstname): void
    {
        $this->userFirstname = $userFirstname;
    }
    public function getMailUser(): string|bool
    {
        return isset($this->userMail) ? $this->userMail : false;
    }
    public function setMailUser(string $userMail): bool
    {
        if(filter_var($userMail, FILTER_VALIDATE_EMAIL))
        {
            $this->userMail = $userMail;
            return true;
        }
        else
            return false;
    }
    public function getDateOfBirth(): string|bool
    {
        return isset($this->DateOfBirth) ? $this->DateOfBirth : false;
    }
    public function setDateOfBirth(string $DateOfBirth): void
    {
        $this->DateOfBirth = $DateOfBirth;
    }

    public function subscribe(Sql $connexion)
    {
        $requete = "INSERT INTO users(username, userfirstname, usermail, dateofbirth, id_role)
        VALUES('$this->userName', '$this->userFirstname', '$this->userMail', '$this->DateOfBirth', 2)";
        $connexion->insertion($requete);
    }
}
