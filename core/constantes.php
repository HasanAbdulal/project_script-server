<?php  
/*
    ./core/constantes.php
*/

// CHEMIN HREF DE BASE
$base_href = explode("public/", $_SERVER['REQUEST_URI']);

define('BASE_HREF_PUBLIC', $base_href[0] . "public/");