<?php 
/*
    ./core/connection.php
*/
try {
    $conn = new PDO('mysql:host=' . DB_Host . ';dbname=' . DB_Name, DB_User, DB_PassWord);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}