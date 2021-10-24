<?php 
/*
    ./app/config/params.php
*/

// Paramètres de connexion sur ma machine
define('DB_Host',       'localhost:3306');
define('DB_Name',       'alex_parker_octobre_2021');
define('DB_User',       'root');
define('DB_PassWord',   '');


// Initialisation des zones dynamiques
$content = "";
$title = "";
$offset = 1;
$script = "";

// Formats de dates par défaut
define('DATE_FORMAT', 'd-m-Y');

// Texte tronqué à 150 caractères
define('TRUNCATE_LENGTH', '150');

// TEXTES
define("TITRE_POSTS_INDEX", "Home");