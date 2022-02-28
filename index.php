<?php
//démarrage de session
session_start();
//instanciation du fuseau horaire
date_default_timezone_set('Europe/Paris');

//lancement de l'autoload (spl = standard php library)
spl_autoload_register(function($className)
{
  include './classes/' . $className . '.php';
});

$michel = new User();

$michel->setNomUser('Neimar');
$michel->setFirstnameUser('Jean');
$michel->setMailUser('raslebol@gmail.com');
$michel->setDateOfBirth('1973-02-28');

//on doit instancier l'objet avec new Sql sinon les parametres sont considérés comme vides
$connexion = new Sql();

$michel->subscribe($connexion);