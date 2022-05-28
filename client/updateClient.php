<?php
session_start();

if(isset($_POST["submit"])){
    require("../db/db.php");


    $dbh = conectar("hotel", "root", "");

    $stmt2 = $dbh->prepare("select * from users where id_user=?");
    $stmt2->bindParam(1, $_SESSION['id']);
    $stmt2->execute();
    while ($row = $stmt2->fetch()) {
        if ($_POST["password"]==$row["password"]) {
            $stmt = $dbh->prepare("update users set first_name=?, last_name=?,  phone=?, password=? where id_user=?");
            $stmt->bindParam(1, $_POST['first_name']);
            $stmt->bindParam(2, $_POST['last_name']);
            $stmt->bindParam(3, $_POST['phone']);
            $stmt->bindParam(4, $_POST["password"]);
            $stmt->bindParam(5, $_SESSION['id']);
            $stmt->execute();
        }else{
            $passHash=password_hash($_POST["password"], PASSWORD_DEFAULT);
            $stmt = $dbh->prepare("update users set first_name=?, last_name=?,  phone=?, password=? where id_user=?");
            $stmt->bindParam(1, $_POST['first_name']);
            $stmt->bindParam(2, $_POST['last_name']);
            $stmt->bindParam(3, $_POST['phone']);
            $stmt->bindParam(4, $passHash);
            $stmt->bindParam(5, $_SESSION['id']);
            $stmt->execute();
        }
    }
    desconectar($dbh);

    header('Location: ../db/exit.php');
}


?>

