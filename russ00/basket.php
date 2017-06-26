<?php require_once "install.php"; ?>
<?php
if (isset($_GET['del']) != 0) {
    $i = 0;
    sort($_SESSION['order']);
    while ($_SESSION['order'][$i]) {
        if ($_GET['del'] == $_SESSION['order'][$i]) {
            $_SESSION['order'][$i] = -1;
            break ;
        }
        $i++;
    }
    header("location:basket.php");
}
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
                        <?php if (!isset($_SESSION['id_user'])) : ?>
                            <a href="index.php?login=ok"
                               style="text-shadow: 2px 2px 15px; text-decoration: none; color: black">Login</a>
                        <?php else : ?>
                            <a href="logout.php" style="text-shadow: 2px 2px 15px; text-decoration: none; color: black">Logout</a>
                        <?php endif; ?>
                    </div>
                    <?php if (!isset($_SESSION['id_user'])) : ?>
                        <div class="registration">
                            <div class="reg">
                                <a href="registration.php">
                                    <p style="text-shadow: 2px 2px 15px; color: black">Registration</p>
                                </a>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="registration">
                            <div class="reg">
                                <p style="text-shadow: 2px 2px 15px; color: black"><?php echo $_SESSION['login']; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<!--    <div class="body" style="background-color: aliceblue; margin-top: 15px; border-radius: 15px">-->
        <div class="content2">
            <div class="tovar_string">
                <?php
                $res = mysqli_query($con, SQL_SELECT_BASKET);
                $i = 0;
                $summ = 0;
                while ($row = mysqli_fetch_assoc($res)) {
                    $i = 0;
                    while ($_SESSION['order'][$i]) {
                        if ($_SESSION['order'][$i] === $row['id']) {
                            echo '<div class="tovar">';
                                echo '<div class="tovar_left_blok">';
                                    echo '<div class="tovar_img">';
                                        echo '<img src="' . $row[img] . '" style="width:100px; height:100px;">';
                                    echo '</div>';
                                    echo '<div class="tovar_cost">';
                                        echo '<p style="width: 120px">' .'<span>'."Cost: ".'</span>'. $row[cost] ." $". '</p>';
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="tovar_right_block">';
                                    echo '<div class="tovar_name">';
                                        echo '<p>' . $row[name] . '</p>';
                                    echo '</div>';
                                    echo '<div class="tovar_descr">';
                                        echo '<p>' . $row[info] . '</p>';
                                    echo '</div>';
                                    echo '<div class="tovar_button">';
                                        echo '<a href="basket.php?del=' . $row['id'] . '">Delete from basket</a>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                            $summ += $row[cost];
                        }
                        $i++;
                    }
                }
                echo '<p style="margin-left: 40px; font-weight: bold">Total cost: ' . $summ ." $". '</p>';
                ?>
                <div>
                    <?php
                    if (isset($_POST['buy'])) {
                        if ($_SESSION['login']) {
                            echo "Your order is send";
                        } else {
                            echo "Please, login first";
                        }
                    }
                    ?>
                    <form action="basket.php" method="post">
                        <button style="margin-left: 40px; height: 35px; width: 70px; font-size: large" type="submit" name="buy">Buy</button>
                    </form>
                </div>
            </div>
<!--        </div>-->
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