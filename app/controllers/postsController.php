<?php 
/*
    ./app/controllers/postsController.php
*/

namespace App\Controllers\PostsController;
use \App\Models\PostsModel;

/**
 * Liste des 10 derniers posts
 *
 * @param \PDO $conn
 * @param integer $off
 * @return void
 */
function indexAction(\PDO $conn, int $off = 1)  {
    // 1. Je demande la liste des posts au modèle et je la mets dans $posts
        include_once "../app/models/postsModel.php";
        $posts = PostsModel\findAll($conn, $off);

    // 2. Je charge la vue posts/index dans $content et je mets le titre dans $title.
    GLOBAL $content, $offset, $title;
    $offset = $off * 10;
    $title = TITRE_POSTS_INDEX;
    ob_start();
        include "../app/views/posts/index.php";
    $content = ob_get_clean();
}


/**
 * DETAIL D'UN POST
 *
 * @param \PDO $conn
 * @param array $data
 * @return void
 */
function showAction(\PDO $conn, array $data) {
    // 1. Je demande le détait d'un post et je le mets dans $post.
        include_once "../app/models/postsModel.php";
        $post = PostsModel\findOneById($conn, $data);

    // 2. Je charge la vue posts/show dans $content.
        GLOBAL $content, $title;
        $title = $data['title'];
        ob_start();
            include "../app/views/posts/show.php";
        $content = ob_get_clean();
}
////////////////////////////////////////////////////
///////////////////////////////////////////////////
/**
 * AJOUTER UN POST: EDIT
 *
 * @param \PDO $conn
 * @return void
 */
function addPostAction(\PDO $conn){

    // Je charge la vue posts/form dans $content.
        GLOBAL $content, $title;
        $title = "Add A New Post";
        ob_start();
            include "../app/views/posts/form.php";
        $content = ob_get_clean();
}
////////////////////////////////////////////////////
///////////////////////////////////////////////////
/**
 * INSERT UN POST
 *
 * @param \PDO $conn
 * @param array $data
 * @return void
 */
function insertPostAction(\PDO $conn, array $data) {

    // 1. Je demande d'ajouter d'un post.
        include_once "../app/models/postsModel.php";
        // Si l'ajout d'un post avec tous les données existe, alors;
        if(PostsModel\insertOnePost($conn, $data) > 0) {
            // Redirection vers la page d'acceuil
            header("location: " . BASE_HREF_PUBLIC);
        }
        else {
            // Sinon, mets dans $content qu'il y a une erreur.
            GLOBAL $content;
            $content = "ERROR";
        }
}
////////////////////////////////////////////////////
///////////////////////////////////////////////////
/**
 * MODIFICATION D'UN POST: Edit
 *
 * @param \PDO $conn
 * @param integer $id
 * @return void
 */
function editPostAction(\PDO $conn, int $id) {

    // 1. Je demande de modifier d'un post selon son $id et je le mets dans $post.
        include_once "../app/models/postsModel.php";
        $post = PostsModel\findOneById($conn, ["id" => $id]);

    // Je charge la vue posts/formEdit dans $content et je mets le titre dans $title.
        GLOBAL $content, $title;
        $title = "Edit This Post";
        ob_start();
            include "../app/views/posts/formEdit.php";
        $content = ob_get_clean();
}
////////////////////////////////////////////////////
///////////////////////////////////////////////////
/**
 * MODIFICATION D'UN POST: UPDATE
 *
 * @param \PDO $conn
 * @param array $data
 * @return void
 */
function updatePostAction(\PDO $conn, array $data){

    // Je demande de modifier d'un post selon son $data;
        include_once "../app/models/postsModel.php";
        PostsModel\updateOneById($conn, $data);
    //et je redirige vers la page d'acceuil.
        header("location: " . BASE_HREF_PUBLIC);
}
////////////////////////////////////////////////////
///////////////////////////////////////////////////
/**
 * SUPPRIMER UN POST
 *
 * @param \PDO $conn
 * @param integer $id
 * @return void
 */
function deletePostAction(\PDO $conn, int $id) {
    // Mise à jour $data via $id dans le postsTable
    include_once "../app/models/postsModel.php";
    // Je demande de supprimer un post selon son $id
    $result = PostsModel\deleteOneById($conn, $id);

    // Si la suppression ne pas réaliser
    if($result === false):
        // REDIRECTION VERS LA PAGE PRÉCÉDENTE
        GLOBAL $script;
        $script .='<script>alert("La Suppression ne pas exécutée !
                        Vous serez redirigé vers la page précédente.");window.history.back();</script>';
    else:
        // REDIRECTION VERS LA PAGE D'ACCEUIL
        header("location: " . BASE_HREF_PUBLIC);
    endif;
}