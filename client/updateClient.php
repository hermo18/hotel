<?php
session_start();

if(isset($_POST["submit"])){
    require("../db/db.php");


    $dbh = conectar("hotel", "root", "");

    $stmt = $dbh->prepare("update users set first_name=?, last_name=?,  phone=?, password=? where id_user=?");
    $stmt->bindParam(1, $_POST['first_name']);
    $stmt->bindParam(2, $_POST['last_name']);
    $stmt->bindParam(3, $_POST['phone']);
    $stmt->bindParam(4, $_POST['password']);
    $stmt->bindParam(5, $_SESSION['id']);
    $stmt->execute();

    desconectar($dbh);

    header('Location: ../db/exit.php');
}


?>

