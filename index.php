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

$michel = new Admin();

$michel->setNomUser('Pauljak');
$michel->setFirstnameUser('Pierre');
$michel->setMailUser('toto@gmail.com');
$michel->setDateOfBirth('1973-05-26');

//on doit instancier l'objet avec new Sql sinon les parametres sont considérés comme vides
$connexion = new Sql();

// $michel->subscribe($connexion);
$michel->deleteUser($connexion, $michel->getMailUser());