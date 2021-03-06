<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOD</title>

    <link rel="stylesheet" href="adminStyle.css">
    <script src="adminJS.js"></script>

    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- boostrap -->

</head>

<body>


    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="admin.php"><i class="bi bi-cone-striped"></i> ADMIN: <?php echo $_SESSION["id"] ?></>
            <br>
            <br>
            <br>
            <a href="users.php"><i class="bi- bi-people"></i> USERS</a>
            <a href="rooms.php">ROOMS</a>
            <b><a href="food.php">FOOD</a></b>
            <a href="create.php">CREATE</a>
            <a href="profile.php">PROFILE</a>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <br>
            <a href="../db/exit.php"><i class="bi bi-box-arrow-in-left"></i> SIGN OUT</a>
    </div>

    <div id="main">
        <button class="openbtn" onclick="openNav()"><i class="bi bi-list"></i></button>
        <br>
        <br>
        <h2>FOOD ORDERS</h2>
        <br><br>
        <?php
        require("../db/db.php");

        $dbh = conectar("hotel", "root", "");

        $stmt2 = $dbh->prepare("select * from order_food inner join food on order_food.id_food = food.id_food where done <> 1");
        $stmt2->setFetchMode(PDO::FETCH_ASSOC);
        $stmt2->execute();

        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">NAME</th>
                    <th scope="col">QUANTITY</th>
                    <th scope="col">PRICE</th>
                </tr>
            </thead>
            <tbody>
                <?php

                while ($row = $stmt2->fetch()) {
                    if ($row["done"] == 1) {
                ?>
                        <tr class="table-success">
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["quantity"]; ?></td>
                            <td><?php echo $row["price"] * $row["quantity"] . "???"; ?></td>
                        </tr>
                    <?php
                    } else {


                    ?>

                        <tr>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["quantity"]; ?></td>
                            <td><?php echo $row["price"] * $row["quantity"] . "???"; ?></td>
                            <td><a class="btn btn-danger" href="doneFood.php?id=<?php echo $row['id_order']; ?>&idUser=<?php echo $row['id_user']; ?>">X</a></td>

                        </tr>

                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <?php
        desconectar($dbh);

        if (isset($_SESSION['user'])) {
            if ($_SESSION['type'] == 1) {
                # code...
            } else {
                header('Location: client.php');
            }
        } else {
            header('Location: login.php');
        }
        ?>


</body>

</html>