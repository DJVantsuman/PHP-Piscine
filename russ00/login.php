<?php
require_once "install.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Shop</title>
    <link rel="stylesheet" href="mystyle.css" type="text/css">
</head>
<body>
<div class="container">
    <div class="h">
        <div class="logo">
            <a href="index.php">
                <img src=img/log/1.png title="Hello! This is Russ00 :)">
            </a>
        </div>
        <div class="name">
            <h1 style="text-shadow: 5px 5px 15px;">Internet shop of electronics </br>and accessories</h1>
        </div>
        <div class="blok_log">
            <div class="blok">
                <div class="back_page">
                    <div class="login">
                        <a href="index.php">
                            <p style="text-shadow: 2px 2px 15px;">Home</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="body" style="background-color: aliceblue; margin-top: 15px; border-radius: 15px">
        <div class="reg_form">
            <?php
            if (isset($_POST['submit'])) {
                $res = mysqli_query($con, SQL_SELECT_USER);
                $login = $_POST['login'];
                $flag = 0;
                $password = hash("md5", $_POST['password']);
                while ($row = mysqli_fetch_assoc($res)) {
                    if (!strcmp($row['login'], $login)) {
                        $flag = 1;
                    }
                }
                if ($flag) {
                    $result = mysqli_query($con, SQL_SELECT_USER);
                    while ($row = mysqli_fetch_assoc($result)) {
                        if (!strcmp($row['login'], $login)) {
                            if (!strcmp($row['password'], $password)) {
                                $flag = 2;
                                $_SESSION['login'] = $login;
                                $_SESSION['id_user'] = $row['id'];
                            }
                        }
                    }
                    if ($flag == 2) {
                        header("location:index.php");
                    } else {
                        echo "Wrong password";
                    }
                } else {
                    echo "Wrong login";
                }
            }
            ?>
            <form action="login.php" method="post">
                <div class="reg_string">
                    <input type="text" name="login" placeholder="login" required>
                </div>
                <div class="reg_string">
                    <input type="password" name="password" placeholder="password" required>
                </div>
                <div class="reg_string">
                    <button type="submit" name="submit" value="Login">Login</button>
                </div>
            </form>
        </div>

    </div>
    <div class="footer">

    </div>
</div>
</body>
</html>