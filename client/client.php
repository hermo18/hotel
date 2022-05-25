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
    <a href="activityClient.php">ACTIVITIES</a>
    <a href="#">BOOKINGS</a>
    <a href="orderFood.php">ORDER FOOD</a>
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

  <div id="main">
    <button class="openbtn" onclick="openNav()"><i class="bi bi-list"></i></button>
    <h2>Collapsed Sidebar</h2>
    <p>Content...</p>
    
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