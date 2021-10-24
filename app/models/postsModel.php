<?php 
/*
    ./app/models/postsModel.php
    Modèle Des Posts
*/

namespace App\Models\PostsModel;

/**
 * CHERCHER TOUS LES POSTS
 *
 * @param \PDO $conn
 * @return array
 */
function findAll(\PDO $conn, int $offset):array{
    $sql = "SELECT *
            FROM posts
            ORDER BY created_at DESC
            LIMIT 10
            OFFSET :offset;
        ";
    $rs = $conn->prepare($sql);
    $rs->bindValue(":offset", $offset, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

/**
 * Retourne un post selon son ID
 *
 * @param \PDO $conn
 * @param integer $id
 * @return array
 */
function findOneById(\PDO $conn, array $data) :array {
    $sql = "SELECT *
            FROM posts
            WHERE id = :id;
        ";
    $rs = $conn->prepare($sql);
    $rs->bindValue(":id", $data['id'], \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

/**
 * INSERT UN POST
 *
 * @param \PDO $conn
 * @param array $data
 * @return integer
 */
function insertOnePost(\PDO $conn, array $data) :int {
    $sql = "INSERT INTO 
            posts 
            (title, text, created_at, image, quote, category_id)
            VALUES
            (:title, :text, NOW(), :image, :quote, :category_id);
        ";
    $rs = $conn->prepare($sql);
    $rs->bindValue(":title",        $data['title'],         \PDO::PARAM_STR);
    $rs->bindValue(":text",         $data['text'],          \PDO::PARAM_STR);
    $rs->bindValue(":image",        $data['image'],         \PDO::PARAM_STR);
    $rs->bindValue(":quote",        $data['quote'],         \PDO::PARAM_STR);
    $rs->bindValue(":category_id",  $data['category_id'],   \PDO::PARAM_INT);
    $rs->execute();
    return $conn->lastInsertId();
}

/**
 * MODIFICATION D'UN POST: UPDATE
 *
 * @param \PDO $conn
 * @param array $data
 * @return integer
 */
function updateOneById(\PDO $conn, array $data) :int {
    $sql = "UPDATE posts
            SET title           = :title,
                text            = :text,
                image           = :image,
                quote           = :quote,
                category_id     = :category_id
            WHERE id = :id;
        ";
    $rs= $conn->prepare($sql);
    $rs->bindValue(":title",        $data['title'],         \PDO::PARAM_STR);
    $rs->bindValue(":text",         $data['text'],          \PDO::PARAM_STR);
    $rs->bindValue(":image",        $data['image'],         \PDO::PARAM_STR);
    $rs->bindValue(":quote",        $data['quote'],         \PDO::PARAM_STR);
    $rs->bindValue(":category_id",  $data['category_id'],   \PDO::PARAM_INT);
    $rs->bindValue(":id",           $data['id'],            \PDO::PARAM_INT);
    return $rs->execute();
}

/**
 * SUPPRIMER UN POST
 *
 * @param \PDO $conn
 * @param integer $id
 * @return boolean
 */
function deleteOneById(\PDO $conn, int $id) :bool {
    $sql = "DELETE FROM posts
            WHERE id = :id;
            ";
    $rs = $conn->prepare($sql);
    $rs->bindValue(":id", $id, \PDO::PARAM_INT);
    return $rs->execute();
}

/**
 * COUNTER TOUS LES POSTS
 *
 * @param \PDO $conn
 * @return array
 */
// function countAllPost(\PDO $conn) :array{
//     $sql = "SELECT count(p.id) as total_post
//             FROM posts p
//             ";
//     $rs = $conn->query($sql);
//     return $rs->fetch(\PDO::FETCH_ASSOC);
// }