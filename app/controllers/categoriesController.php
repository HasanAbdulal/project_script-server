<?php 
/*
    ./app/controllers/categoriesController.php 
*/
namespace App\Controllers\CategoriesController;
use \App\Models\CategoriesModel;

// LIST DES CATEGORIES 
function catListAction(\PDO $conn, array $data) {

    include_once '../app/models/categoriesModel.php'; 
    $posts = CategoriesModel\findPostByCatId($conn, $data);

    GLOBAL $content, $title;
    $title = $data['title'];
    ob_start();
        include '../app/views/posts/index.php';
    $content = ob_get_clean();
}