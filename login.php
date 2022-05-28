<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDICE</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>

<body>
    <script>
        function direction(ruta) {
            window.location.href = ruta;
        }
    </script>



    <section class="vh-100" style="background-color: gray;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="img/log.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="login.php" method="post">

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Sign into your account</span>
                                        </div>



                                        <div class="form-outline mb-4">
                                            <input type="email" name="user" class="form-control form-control-lg" />
                                            <label class="form-label">Email address</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" name="pass" class="form-control form-control-lg" />
                                            <label class="form-label">Password</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <!-- <button class="btn btn-dark btn-lg btn-block" type="button" name="submit">Login</button> -->
                                            <input class="btn btn-dark btn-lg btn-block" type="submit" value="LOGIN" name="submit">

                                            <input type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter" value="REGISTER">


                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="registerUser.php" method="post">
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
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" minlength="6" maxlength="15" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">REGISTER</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    require("db\db.php");
    if (isset($_POST["submit"])) {
        $dbh = conectar("hotel", "root", "");

        $stmt = $dbh->prepare("select * from users where email=?");
        $stmt->bindParam(1, $_POST["user"]); //checks email
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        if (($row = $stmt->fetch()) == 0) {
            echo "<script>alert('INVALID USERNAME OR PASSWORD')</script>";
        } else {
            $stmt = $dbh->prepare("select * from users where email=?");
            $stmt->bindParam(1, $_POST["user"]);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                if (password_verify($_POST["pass"], $row["password"])) {
                    $_SESSION["user"] = $_POST["user"];
                    $_SESSION["type"] = $row["type_user"];
                    $_SESSION["id"] = $row["id_user"];
                    $_SESSION["dni"] = $row["dni"];
                    $_SESSION["phone"] = $row["phone"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["first"] = $row["first_name"];
                    $_SESSION["last"] = $row["last_name"];
                    $_SESSION["password"] = $row["password"];
                    if ($_SESSION["type"] == 4) {
                        echo "<script>location='client/client.php';</script>";
                    } else {
                        echo "<script>location='admin/admin.php';</script>";
                    }
                } else {
                    echo "<script>alert('INVALID USERNAME OR PASSWORD')</script>";
                }
            }
        }
        desconectar($dbh);
    }


    ?>

</body>

</html>