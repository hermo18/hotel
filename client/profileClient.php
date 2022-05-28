<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PROFILE</title>

  <link rel="stylesheet" href="clientStyle.css">
  <script src="clientJS.js"></script>

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
    <a href="admin.php"><i class="bi bi-moon"></i> USER: <?php echo $_SESSION["id"] ?></a>
    <br>
    <br>
    <br>
    <a href="activityClient.php">ACTIVITIES</a>
    <a href="roomClient.php">BOOKINGS</a>
    <a href="orderFood.php">ORDER FOOD</a>
    <b><a href="#">PROFILE</a></b>
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
    <div class="modal-content">

                <div class="modal-body">
                    <form action="updateClient.php" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" value=<?php echo $_SESSION["email"] ?> name="email" required disabled>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-sm">
                                <input type="text" class="form-control" name="first_name" value=<?php echo $_SESSION["first"] ?> placeholder="First name" required>
                            </div>
                            <div class="form-group col-sm">
                                <input type="text" class="form-control" name="last_name" value=<?php echo $_SESSION["last"] ?> placeholder="Last name" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="dni" placeholder="DNI" value=<?php echo $_SESSION["dni"] ?> minlength="9" maxlength="9" required disabled>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" placeholder="Phone" value=<?php echo $_SESSION["phone"] ?> minlength="9" maxlength="9" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" value=<?php echo $_SESSION["password"] ?> placeholder="Password" minlength="6" maxlength="15" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Reset</button>
                    <button type="submit" class="btn btn-primary" name="submit">UPDATE</button>
                </div>
                </form>
            </div>
    
  </div>

  <?php
    if (isset($_SESSION['user'])) {
      if ($_SESSION['type']==4) {
        # code...
      }else{
        header('Location: admin.php');
      }
    }else{
      header('Location: login.php');
    }
  ?>


</body>

</html>