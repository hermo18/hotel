<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERS</title>

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
        <a href="admin.php"><i class="bi bi-cone-striped"></i> ADMIN: <?php echo $_SESSION["id"] ?></a>
        <br>
        <br>
        <br>
        <b></b><a href="#"><i class="bi- bi-people"></i> USERS</a></b>
        <a href="rooms.php">ROOMS</a>
        <a href="food.php">FOOD</a>
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
        <h2>USERS</h2>
        <br><br>
        <form action="users.php" method="post">
            SEARCH DNI USER: <input class="form-group" type="number" name="dni">
            <button type="submit" name="submit" class="btn btn-primary">SEARCH</button>
            <button class="btn btn-secondary" onClick="window.location.reload();">Restart</button>
        </form>
    </div>

    <?php
    require("../db/db.php");


    $dbh = conectar("hotel", "root", "");


    if (isset($_POST["submit"])) {
        $stmt = $dbh->prepare("select * from users where dni=?");
        $stmt->bindParam(1, $_POST["dni"]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

    ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">FIRST NAME</th>
                    <th scope="col">LAST NAME</th>
                    <th scope="col">DNI</th>
                    <th scope="col">TYPE USER</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">PHONE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $stmt->fetch()) {
                ?>
                    <tr>
                        <td><?php echo $row["first_name"]; ?></td>
                        <td><?php echo $row["last_name"]; ?></td>
                        <td><?php echo $row["dni"]; ?></td>
                        <td><?php echo $row["type_user"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["phone"]; ?></td>
                    </tr>
                <?php
                }
            } else {



                $stmt2 = $dbh->prepare("select * from users");
                $stmt2->setFetchMode(PDO::FETCH_ASSOC);
                $stmt2->execute();

                ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">FIRST NAME</th>
                            <th scope="col">LAST NAME</th>
                            <th scope="col">DNI</th>
                            <th scope="col">TYPE USER</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">PHONE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $stmt2->fetch()) {
                        ?>
                            <tr>
                                <td><?php echo $row["first_name"]; ?></td>
                                <td><?php echo $row["last_name"]; ?></td>
                                <td><?php echo $row["dni"]; ?></td>
                                <td><?php echo $row["type_user"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $row["phone"]; ?></td>
                            </tr>
                    <?php
                        }
                    }

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