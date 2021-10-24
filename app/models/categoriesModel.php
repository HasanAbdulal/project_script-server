<?php 
/*
    ./app/models/categoriesModel.php
*/
namespace App\Models\CategoriesModel;


/**
 * Afficher toutes les catégories
 *
 * @param \PDO $conn
 * @return array
 */
function findAllCat(\PDO $conn) :array {
    $sql = "SELECT c.*, count(p.id) as nb_post
            FROM posts p
            JOIN categories c ON p.category_id = c.id
            GROUP BY c.id
            ORDER BY nb_post ASC;
            ";
    $rs = $conn->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

/**
 * Catégorie d'un post
 *
 * @param \PDO $conn
 * @param integer $id
 * @return array
 */
function findOneByCatId(\PDO $conn, int $id) :array {
    $sql = "SELECT *
            FROM posts p
            JOIN categories c ON p.category_id = c.id
            WHERE p.id = :id;
        ";
    $rs = $conn->prepare($sql);
    $rs->bindValue(":id", $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

/**
 * Undocumented function
 *
 * @param \PDO $conn
 * @param array $data
 * @return array
 */
function findPostByCatId(\PDO $conn, array $data):array{
    $sql = "SELECT *
            FROM posts p
            where p.category_id = :id
            ORDER BY created_at DESC;
        ";
    $rs = $conn->prepare($sql);
    $rs->bindValue(":id", $data['id'], \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}