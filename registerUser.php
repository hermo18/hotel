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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>
<?php

        require("db\db.php");
        if (isset($_POST["submit"]) && $_SESSION["type"]==1) {
            $dbh=conectar("hotel", "root", "");

            $stmt=$dbh->prepare("select * from users where email=?");
            $stmt->bindParam(1, $_POST["email"]);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $stmt2=$dbh->prepare("select * from users where dni=?");
            $stmt2->bindParam(1, $_POST["dni"]);
            $stmt2->setFetchMode(PDO::FETCH_ASSOC);
            $stmt2->execute();

            $passHash=password_hash($_POST["password"], PASSWORD_DEFAULT);

            if (($row = $stmt->fetch())!=0 || ($row2 = $stmt2->fetch())!=0)
                if ($_SESSION["type"]==1) {
                    echo "<script>alert('EMAIL OR DNI NOT VALID'); location='admin/create.php';</script>";
                }else
                    echo "<script>alert('EMAIL OR DNI NOT VALID'); location='login.php';</script>";
            else{
                $stmt=$dbh->prepare("insert into users (first_name, last_name, email, phone, dni, password, type_user) values (?, ?, ?, ?, ?, ?, ?)");
                $stmt->bindParam(1, $_POST["first_name"]);
                $stmt->bindParam(2, $_POST["last_name"]);
                $stmt->bindParam(3, $_POST["email"]);
                $stmt->bindParam(4, $_POST["phone"]);
                $stmt->bindParam(5, $_POST["dni"]);
                $stmt->bindParam(6, $passHash);
                $stmt->bindParam(7, $_POST["type"]);
                $stmt->execute();

                echo "<script>alert('YOUR ACCOUNT HAS BEEN CREATED'); location='admin/admin.php';</script>";

            }   
            desconectar($dbh);
        }else{
            $dbh=conectar("hotel", "root", "");

            $stmt=$dbh->prepare("select * from users where email=?");
            $stmt->bindParam(1, $_POST["email"]);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $stmt2=$dbh->prepare("select * from users where dni=?");
            $stmt2->bindParam(1, $_POST["dni"]);
            $stmt2->setFetchMode(PDO::FETCH_ASSOC);
            $stmt2->execute();

            $passHash=password_hash($_POST["password"], PASSWORD_DEFAULT);

            if (($row = $stmt->fetch())!=0 || ($row2 = $stmt2->fetch())!=0)
                echo "<script>alert('EMAIL OR DNI NOT VALID'); location='login.php';</script>";
            else{
                $stmt=$dbh->prepare("insert into users (first_name, last_name, email, phone, dni, password, type_user) values (?, ?, ?, ?, ?, ?, 4)");
                $stmt->bindParam(1, $_POST["first_name"]);
                $stmt->bindParam(2, $_POST["last_name"]);
                $stmt->bindParam(3, $_POST["email"]);
                $stmt->bindParam(4, $_POST["phone"]);
                $stmt->bindParam(5, $_POST["dni"]);
                $stmt->bindParam(6, $passHash);
                $stmt->execute();

                echo "<script>alert('YOUR ACCOUNT HAS BEEN CREATED'); location='login.php';</script>";

            }   
            desconectar($dbh);
        }
        
        
    ?>
</body>
</html>