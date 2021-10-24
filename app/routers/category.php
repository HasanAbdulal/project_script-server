<?php 
/*
    ./app/routers/category.php
*/

switch ($_GET['category']) {
    case "catList":
        // ROUTE DU DETAILS DES POSTS PAR CATEGORIE
        // PATTERN: ?category=catList&categoryID=$1&categoryTitle=$2
        // CTRL: categoriesController
        // ACTION: catList
        include_once '../app/controllers/categoriesController.php';
        App\Controllers\CategoriesController\catListAction($conn, [
            "id"        => $_GET['categoryID'],
            "title"     => $_GET['categoryTitle']
        ]);
    break;
}