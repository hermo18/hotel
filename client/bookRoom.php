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
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="client.php"><i class="bi bi-moon"></i> USER: <?php echo $_SESSION["id"] ?></a>
        <br>
        <br>
        <br>
        <br>
        <a href="activityClient.php">ACTIVITIES</a>
        <b><a href="roomClient.php">BOOKINGS</a></b>
        <a href="profileClient.php">PROFILE</a>
        <a href="orderFood.php">ORDER FOOD</a>
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
        <br><br>
        <h2>AVAILABLE ROOMS</h2>
        <br>

        <?php


        if (isset($_POST["submit"])) {
            $typeRoom = $_POST["activityName"];
            $dateB = strtotime($_POST["dateBook"]);
            $dateE = strtotime($_POST["dateEnd"]);
            $beds = $_POST["beds"];


            if ($dateB > $dateE) {
                echo "<script>alert('NOT VALID DATE');
                location='roomClient.php.php';
                </script>";
            }
            $days = ($dateB - $dateE) / 86400;
            $days = abs($days);
            $days = floor($days);

            $_SESSION["dateB"]=$_POST["dateBook"];
            $_SESSION["dateE"]=$_POST["dateEnd"];
            $_SESSION["beds"]=$beds;
            $_SESSION["days"]=$days;

            require("../db/db.php");
            $dbh = conectar("hotel", "root", "");

            $stmt = $dbh->prepare("SELECT t.name, r.n_beds, r.price, r.id_room 
            from rooms as r 
            INNER join trooms as t on r.type_room=t.id_type  
            where t.id_type=? and r.n_beds=? AND r.id_room NOT IN (select id_room from booking_room where dateIn=?) order by r.price asc limit 10");
            $stmt->bindParam(1, $typeRoom);
            $stmt->bindParam(2, $beds);
            $stmt->bindParam(3, $_POST["dateBook"]);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
        ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ROOM</th>
                        <th scope="col">NUM BEDS</th>
                        <th scope="col">PRICE</th>
                        <th scope="col">TOTAL PRICE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($row = $stmt->fetch()) {
                    ?>

                        <tr>
                            <td><?php echo $row["id_room"]; ?></td>
                            <td><?php echo $row["n_beds"]; ?></td>
                            <td><?php echo $row["price"]; ?></td>
                            <td><?php echo $row["price"] * $days; ?></td>
                            <td><a class="btn btn-success" href="payRoom.php?id=<?php echo $row['id_room']; ?>">PAY</a></td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php

            if (isset($_GET['id_room'])) {
                $stmt2 = $dbh->prepare("insert into booking_room (id_user, id_room, dateOut, dateIn, days) values (?,?,?,?,?)");
                $stmt2->bindParam(1, $_SESSION["id"]);
                $stmt2->bindParam(2, $_GET['id_room']);
                $stmt2->bindParam(3, $dateE);
                $stmt2->bindParam(4, $dateB);
                $stmt2->bindParam(5, $days);
                $stmt->execute();
                echo "<script>alert('BOOK COMPLETE');
                location='roomClient.php';
                </script>";
            }
            desconectar($dbh);
        }

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