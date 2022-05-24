<?php
session_start();

if (isset($_GET['id'])) {
    $idActivity=$_GET['id'];

    require("../db/db.php");


    $dbh = conectar("hotel", "root", "");

    $stmt = $dbh->prepare("delete from booking_activities where id_user=? and id_booking=?");
    $stmt->bindParam(1, $_SESSION["id"]);
    $stmt->bindParam(2, $idActivity);
    $stmt->execute();

    desconectar($dbh);

    header('Location: activityClient.php');

}
    
?>
