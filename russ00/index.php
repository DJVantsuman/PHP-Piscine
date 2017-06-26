<?php require_once "install.php"; ?>
<?php
if (isset($_GET['prod'])) {
    $_SESSION['order'][] = $_GET['prod'];
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
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
                <div class="log_in">
                    <div class="login">
                        <?php if (!isset($_SESSION['id_user'])) : ?>
                            <a href="login.php"
                               style="text-shadow: 2px 2px 15px; text-decoration: none; color: black">Login</a>
                        <?php else : ?>
                            <a href="logout.php" style="text-shadow: 2px 2px 15px; text-decoration: none; color: black">Logout</a>
                        <?php endif; ?>
                    </div>
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
            <div class="blok">
                <div class="buskket_adm">
                    <?php
                    $id_user = $_SESSION['id_user'];
                    $res = mysqli_query($con, "SELECT root FROM user WHERE id = '$id_user'");
                    $row = mysqli_fetch_assoc($res);
                    if ($row['root'] == 1) {
                        echo '<a href="admin.php" style="text-shadow: 2px 2px 15px; text-decoration: none; color: black">Admin page</a>';
                    }
                    ?>
                </div>
                <div class="buskket_adm">
                    <a href="basket.php">
                        <img src=img/basket.png title="Basket" width="80px" height="80px">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="body">
        <div class="sort">
            <ul style="list-style: none; font-size: 20px">
                <?php
                $cat = mysqli_query($con, "SELECT * FROM categories");
                $tmp = "";
                while ($row = mysqli_fetch_assoc($cat)) {
                    if (strcmp($tmp, $row['name_cat'])) {
                        echo '<li><a style="text-decoration: none; color: black" href="index.php?cat=' . $row['name_cat'] . '">' . $row['name_cat'] . '</a></li>';
                        $tmp = $row['name_cat'];
                    }
                }
                ?>
            </ul>
        </div>
        <div class="content">
            <div class="tovar_string">
                <?php if (!$_GET['cat']) : ?>
                    <?php
                    $res = mysqli_query($con, SQL_SELECT_BASKET);
                    while ($row = mysqli_fetch_assoc($res)) {
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
                                    echo '<a href="index.php?prod=' . $row[id] . '">Add to basket</a>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                    ?>
                <?php endif; ?>
                <?php if ($_GET['cat']) : ?>
                    <?php
                    $cat = $_GET['cat'];
                    $res = mysqli_query($con, "SELECT * FROM categories WHERE name_cat = '$cat'");
                    while ($row = mysqli_fetch_assoc($res)) {
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
                                    echo '<a href="index.php?prod=' . $row[id_prod] . '">Add to basket</a>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                    ?>
                <?php endif; ?>
            </div>
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