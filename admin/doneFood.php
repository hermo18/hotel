<?php
session_start();

if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $idUser=$_GET['idUser'];


    require("../db/db.php");


    $dbh = conectar("hotel", "root", "");

    $stmt = $dbh->prepare("update order_food set done=1 where id_user=? and id_order=?");
    $stmt->bindParam(1, $idUser);
    $stmt->bindParam(2, $id);
    $stmt->execute();

    desconectar($dbh);

    header('Location: food.php');

}
    
?>