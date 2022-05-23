<?php
session_start();
?>

<?php
if (isset($_POST["submit"])) {
    $date = $_POST["dateBook"];
    $people = $_POST["people"];
    $activityName = $_POST["activityName"];


    require("../db/db.php");


    $dbh = conectar("hotel", "root", "");
    $stmt = $dbh->prepare("insert into booking_activities (id_user, id_activity, day, nPeople) values (?, ?, ?, ?)");
    $stmt->bindParam(1, $_SESSION["id"]);
    $stmt->bindParam(2, $activityName);
    $stmt->bindParam(3, $date);
    $stmt->bindParam(4, $people);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    desconectar($dbh);

    echo "<script>location='activityClient.php';</script>";
}
