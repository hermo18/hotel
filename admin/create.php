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
            <a href="#"><i class="bi- bi-people"></i> USERS</a>
            <a href="#">ROOMS</a>
            <a href="food.php">FOOD</a>
            <b><a href="create.php">CREATE</a></b>
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
        <h2>CREATE USER</h2>
        <br><br>
        <form action="../registerUser.php" method="post">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email" required>
            </div>
            <br>
            <div class="row">
                <div class="form-group col-sm">
                    <input type="text" class="form-control" name="first_name" placeholder="First name" required>
                </div>
                <div class="form-group col-sm">
                    <input type="text" class="form-control" name="last_name" placeholder="Last name" required>
                </div>
            </div>
            <br>
            <div class="form-group">
                <input type="text" class="form-control" name="dni" placeholder="DNI" minlength="9" maxlength="9" required>
            </div>
            <br>
            <div class="form-group">
                <input type="text" class="form-control" name="phone" placeholder="Phone" minlength="9" maxlength="9" required>
            </div>
            <br>
            <div class="row">
                <div class="form-group col-sm">
                    <input type="password" class="form-control" name="password" placeholder="Password" minlength="6" maxlength="15" required>
                </div>
                <div class="form-group col-sm">
                    <input type="number" class="form-control" name="type" placeholder="Type" min="1" max="4" required>
                </div>
            </div>
    </div>
    <div class="modal-footer">
        <button type="reset" class="btn btn-secondary">Reset</button>
        <button type="submit" class="btn btn-primary" name="submit">REGISTER</button>
    </div>
    </form>
    </div>

    <?php
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