<?php 
/*
    ./app/routers/posts.php
    Router Des Posts
*/

use \App\Controllers\PostsController;

// CTRL: postsController
include_once "../app/controllers/postsController.php";

switch ($_GET['post']):

    case "show" :
        // ROUTE DE DéTAIL D'UN POST SELON SON ID
        // PATTERN: ?post=show&postID=$1&postTitle=$2
        // ACTION: show
        PostsController\showAction($conn, [
            "id"    => $_GET['postID'],
            "title" => $_GET['postTitle']
        ]);
    break;

    case "addPost" :
        // ROUTE D'AJOUT D'UN POST : AFFICHAGE DU FORMULAIRE
        // PATTERN: ?post=addPost
        // ACTION: addPost
        PostsController\addPostAction($conn);
    break;

    case "insertPost" :
        // ROUTE D'AJOUT D'UN POST: INSERT
        // PATTERN: ?post=insertPost
        // ACTION: insertPost
        if(strlen($_FILES["image"]["name"]) > 0):
            Core\Functions\uploadFile("image", "/assets/images/blog/");
            $image = $_FILES["image"]["name"];
        else:
            $image = "1.jpg";
        endif;
        PostsController\insertPostAction($conn, [
            "title"         => $_POST['title'],
            "text"          => $_POST['text'],
            "image"         => $image,
            "quote"         => $_POST['quote'],
            "category_id"   => $_POST['category_id']
        ]);
    break;

    case "editPost": 
        // ROUTE DE MODIFICATION D'UN POST: Edit
        // PATTERN: ?post=editPost&postID=X
        // ACTION: editPost
        // REDIRECTION VERS L'ACCUEIL
        PostsController\editPostAction($conn, $_GET['postID']);
    break;

    case "updatePost" : 
        // ROUTE DE MODIFICATION D'UN POST: UPDATE
        // PATTERN: ?post=updatePost&postID=X
        // ACTION: updatePost
        if(strlen($_FILES["image"]["name"]) > 0):
            Core\Functions\uploadFile("image", "/assets/images/blog/");
            $image = $_FILES["image"]["name"];
        else:
            $image = $_POST['imageName'];
        endif;
        PostsController\updatePostAction($conn, [
            "id"            => $_GET['postID'],
            "title"         => $_POST['title'],
            "text"          => $_POST['text'],
            "image"         => $image,
            "quote"         => $_POST['quote'],
            "category_id"   => $_POST['category_id']
        ]);
    break;

    case "deletePost":
        // ROUTE DE SUPPRISSION D'UN POST
        // PATTERN: ?post=deletePost&postID=X
        // ACTION: deletePost
        // REDIRECTION VERS L'ACCUEIL
        PostsController\deletePostAction($conn, intval($_GET['postID']));
    break;

    default:
        // ROUTE PAR DÉFAUT
        // PATTERN: /
        // ACTION: index
        PostsController\indexAction($conn);
    break;

endswitch;