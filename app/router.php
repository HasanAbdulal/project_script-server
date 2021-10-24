<?php 
/*
    ./app/router.php
    Router Principal
*/

    // Charger le routeur des posts 
if(isset($_GET['post'])):
    include_once "../app/routers/posts.php";

    // Charger le routeur des catégories
elseif(isset($_GET['category'])):
    include_once "../app/routers/category.php";
endif;