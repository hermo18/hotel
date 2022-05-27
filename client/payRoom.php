<?php
session_start();

require("../db/db.php");
$dbh = conectar("hotel", "root", "");

if (isset($_GET['id'])) {
    $stmt2 = $dbh->prepare("insert into booking_room (id_user, id_room, dateOut, dateIn, days) values (?,?,?,?,?)");
    $stmt2->bindParam(1, $_SESSION["id"]);
    $stmt2->bindParam(2, $_GET['id']);
    $stmt2->bindParam(3, $_SESSION["dateE"]);
    $stmt2->bindParam(4, $_SESSION["dateB"]);
    $stmt2->bindParam(5, $_SESSION["days"]);
    $stmt2->execute();
    echo "<script>alert('BOOK DONE');
    location='roomClient.php';
    </script>";
}
?>
