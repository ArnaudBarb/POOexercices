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


