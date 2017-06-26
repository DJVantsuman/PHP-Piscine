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
            <div class="logo" >
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
                <form action="registration.php" method="post">
					<?php
					if (isset($_POST['submit'])) {
						$login = $_POST['login'];
						$flag = 1;
						$password = hash("md5", $_POST['passwd']);
						$conf_pssword = hash("md5", $_POST['confirmpw']);
                        $res = mysqli_query($con, SQL_SELECT_USER);
                        while ($row = mysqli_fetch_assoc($res)) {
                            if (!strcmp($row['login'], $login)) {
                                $flag = 0;
                            }
                        }
                        if ($flag) {
                            if ($password === $conf_pssword) {
                                $sql = "INSERT INTO user (login, password, root) VALUES ('$login', '$password', 0)";
                                mysqli_query($con, $sql);
                                header("location:index.php");
                            } else {
                                echo "Wrong confirm password";
                            }
                        } else {
                            echo "This login are exists";
                        }
					}
					?>
                    <div class="reg_string">
                        <input placeholder="Login" type="text" name="login" value="" required/>
                    </div>
                    <div class="reg_string">
                        <input placeholder="Password" type="password" name="passwd" value="" required/>
                    </div>
                    <div class="reg_string">
                        <input placeholder="Confirm password" type="password" name="confirmpw" value="" required/>
                    </div>
                    <div class="reg_string">
                        <button type="submit" name="submit" value="OK">Registration</button>
                    </div>
                </form>
            </div>

        </div>
        <div class="footer">
            <div class="created_by">
                <p>Created by: © "ITsuman & RKonoval Company"</p></br>
                <p></p>
            </div>
            <div class="tm">
                <p> © Internet shop «RUSH» 2017</p>
            </div>
        </div>
    </div>
</body>
</html>