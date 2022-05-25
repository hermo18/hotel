<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="clientStyle.css">
    <script src="clientJS.js"></script>

    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- boostrap -->

</head>

<body>
    <script>
        function DeleteConfirm() {
            confirm("Are you sure to delete the activity?");
        }
    </script>

    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="client.php"><i class="bi bi-moon"></i> USER: <?php echo $_SESSION["id"] ?></a>
        <br>
        <br>
        <br>
        <br>
        <a href="activityClient.php">ACTIVITIES</a>
        <a href="#">BOOKINGS</a>
        <b><a href="#">ORDER FOOD</a></b>
        <a href="profileClient.php">PROFILE</a>
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

    <!-- MODAL -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ORDER FOOD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="payFood.php" method="post">
                        <div class="form-group">
                            <select name="foodName" class="form-select">
                                <option selected>Select food</option>
                                <option value="1">Burguer</option>
                                <option value="2">Fish and chips</option>
                                <option value="3">Paella</option>
                                <option value="4">Chinese</option>
                            </select>
                            <br>
                            <input type="number" name="quantity" class="form-control" min=1 placeholder="Quantity">

                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">ORDER</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- MODAL -->
    <img src="" alt="">
    <div id="main">
        <button class="openbtn" onclick="openNav()"><i class="bi bi-list"></i></button>
        <br><br>
        <h2>ORDER FOOD</h2>
        <br>
        <?php
        require("../db/db.php");


        $dbh = conectar("hotel", "root", "");

        $stmt = $dbh->prepare("select * from food");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();



        echo '<div class="row">';
        while ($row = $stmt->fetch()) {

            echo "<div class='col-sm-3'>";
            echo "<div class='card'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>{$row['name']}</h5>";
            echo "<p>PRICE: {$row['price']}€</p>";
            echo "<img src='{$row['photo']}' width='70%'>";
            echo "<br>";
            echo "<br>";
            echo '<input type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter" value="ORDER">';
            echo "</div>";
            echo "</div>";
            echo " </div>";
        }
        echo "</div>";
        echo "<br>";
        echo "<br>";

        desconectar($dbh);

        $dbh = conectar("hotel", "root", "");

        $stmt2 = $dbh->prepare("select name, quantity, price, done from order_food inner join food on order_food.id_food = food.id_food where id_user=? order by done asc");
        $stmt2->bindParam(1, $_SESSION["id"]); //checks email
        $stmt2->setFetchMode(PDO::FETCH_ASSOC);
        $stmt2->execute();

        ?>
        <h3>ORDERS</h3>
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
                            <td><?php echo $row["price"] * $row["quantity"] . "€"; ?></td>
                        </tr>
                    <?php
                    } else {


                    ?>

                        <tr>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["quantity"]; ?></td>
                            <td><?php echo $row["price"] * $row["quantity"] . "€"; ?></td>

                        </tr>

                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <?php



        desconectar($dbh);

        ?>



        <?php
        if (isset($_SESSION['user'])) {
            if ($_SESSION['type'] == 4) {
                # code...
            } else {
                header('Location: admin.php');
            }
        } else {
            header('Location: login.php');
        }
        ?>


</body>

</html>