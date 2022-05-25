<?php
session_start();
?>

<?php
if (isset($_POST["submit"])) {
    $name = $_POST["foodName"];
    $quantity = $_POST["quantity"];


    require("../db/db.php");


    $dbh = conectar("hotel", "root", "");
    $stmt = $dbh->prepare("insert into order_food (id_user, id_food, quantity) values (?, ?, ?)");
    $stmt->bindParam(1, $_SESSION["id"]);
    $stmt->bindParam(2, $name);
    $stmt->bindParam(3, $quantity);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    desconectar($dbh);

    echo "<script>location='orderFood.php';</script>";
}
