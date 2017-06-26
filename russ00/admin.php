<?php require_once "install.php"; ?>

<?php
if (isset($_GET['del_cat'])) {
    $name_del = $_GET['del_cat'];
    $res = mysqli_query($con, "DELETE FROM categories WHERE name_cat = '$name_del'");
    header("location:admin.php?categories=ok");
}
?>

<?php
if (isset($_POST['add_product'])) {
    $uploaddir = 'img/';
    $uploadfile = $uploaddir . basename($_FILES['img']['name']);
    $product = $_POST['name'];
    $img = $uploadfile;
    $cost = $_POST['cost'];
    $info = $_POST['info'];
    $sql = "INSERT INTO basket (name, img, cost, info) VALUES ('$product', '$img', '$cost', '$info')";
    mysqli_query($con, $sql);
    copy($_FILES['img']['tmp_name'], $uploadfile);
    header("location:admin.php?product=ok");
}
?> <!-- add product -->

<?php
if (isset($_POST['change_product'])) {
    $id_img = $_GET['edit'];
    $name = $_POST['name_c'];
    $cost = $_POST['cost_c'];
    $info = $_POST['info_c'];
    $sql = "UPDATE basket SET name = '$name', cost = '$cost', info = '$info' WHERE id = '$id_img'";
    mysqli_query($con, $sql);
    header("location:admin.php?product=ok");
}
?> <!-- chage product php -->

<?php if (isset($_GET['edit'])) : ?>
    <div style="width: 100%; height: 100%; z-index: 2; position:absolute; background-color: rgba(0, 0, 0, 0.7)">
        <?php
        $id_img = $_GET['edit'];
        $sql = "SELECT name, img, cost, info FROM basket WHERE id = '$id_img'";
        $res = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($res);
        ?>
        <div style="width: 100%; height: 100px; margin-left: 100px; margin-top: 50px; color: aliceblue">
            <form method="post" action="admin.php?edit=<?php echo $_GET['edit']; ?>">
                Name: <input style="margin-right: 30px; font-size: 15px" class="inp" type="text" name="name_c"
                             value="<?php echo $row['name']; ?>" required>
                Cost:<input style="margin-right: 30px; font-size: 15px" class="inp" type="text" name="cost_c"
                            value="<?php echo $row['cost']; ?>" required>
                Description: <input style="font-size: 15px; width: 400px" class="inp" type="text" name="info_c"
                                    value="<?php echo $row['info']; ?>" required>
                <button class="inp_but" type="submit" name="change_product">Add</button>
            </form>
        </div>
        <a style="margin-left: 100px; font-size: 25px; text-decoration: none; color: white" href="admin.php?product=ok"
           style="background-color: red">Exit</a>
    </div><!-- chage product form -->
<?php endif; ?>

<?php if (isset($_GET['del'])) {
    $name = $_GET['del'];
    $sql = "DELETE FROM basket WHERE name = '$name'";
    $sqll = "DELETE FROM categories WHERE name = '$name'";
    mysqli_query($con, $sql);
    mysqli_query($con, $sqll);
    header("location:admin.php?product=ok");
}
?><!-- delete product -->

<?php
if (isset($_GET['del_user'])) {
    $id_user = $_GET['del_user'];
    $sql = "DELETE FROM user WHERE id = '$id_user'";
    mysqli_query($con, $sql);
    header("location:admin.php?user=ok");
}
?><!-- delete user -->

<?php
if (isset($_GET['set'])) {
    $id = $_GET['set'];
    $res = mysqli_query($con, "UPDATE user SET root = 1 WHERE id = '$id'");
    header("location:admin.php?user=ok");
}
?> <!-- set admin -->

<?php
if (isset($_GET['unset'])) {
    $id = $_GET['unset'];
    $res = mysqli_query($con, "UPDATE user SET root = 0 WHERE id = '$id'");
    header("location:admin.php?user=ok");
}
?> <!-- unset admin -->
<?php
if (isset($_POST['add_categories'])) {
    $id_prod = $_GET['cat_id'];
    $name_cat = $_POST['categ'];
    $prod = "SELECT * FROM basket WHERE id = '$id_prod'";
    $prod_res = mysqli_query($con, $prod);
    $row = mysqli_fetch_assoc($prod_res);
    $name = $row['name'];
    $img = $row['img'];
    $cost = $row['cost'];
    $info = $row['info'];
    $sql = "INSERT INTO categories (name_cat, id_prod, name, img, cost, info) VALUES ('$name_cat', '$id_prod', '$name', '$img', '$cost', '$info')";
    $res = mysqli_query($con, $sql);
    header("location:admin.php?categories=ok");
}
?> <!-- add categories -->
<?php if (isset($_GET['cat_id'])) : ?>
    <div style="width: 100%; height: 100%; z-index: 2; position:absolute; background-color: rgba(0, 0, 0, 0.7)">
        <div style="width: 100%; height: 100px; margin-left: 100px; margin-top: 50px; color: aliceblue">
            <form method="post" action="admin.php?cat_id=<?php echo $_GET['cat_id'] ?>">
                New category: <input style="margin-right: 30px; font-size: 20px" class="inp" type="text" name="categ"
                                     required>
                <button class="inp_but" type="submit" name="add_categories">Add</button>
            </form>
        </div>
        <a href="admin.php?categories=ok"
           style="margin-left: 100px; font-size: 25px; text-decoration: none; color: white">Exit</a>
    </div> <!-- add categories form -->
<?php endif; ?>
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
                            <a href="index.php?login=ok"
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
                <li><a style="text-decoration: none; color: black" href="admin.php?user=ok">Users</a></li>
                <li><a style="text-decoration: none; color: black" href="admin.php?product=ok">Products</a></li>
                <li><a style="text-decoration: none; color: black" href="admin.php?categories=ok">Categories</a></li>
            </ul>
        </div>
        <?php if (!isset($_GET['user']) && !isset($_GET['product']) && !isset($_GET['categories'])) : ?>
            <div class="content"></div>
        <?php endif; ?>
        <?php if (isset($_GET['user'])) : ?>
            <div class="content">
                <?php
                $res = mysqli_query($con, SQL_SELECT_USER);
                while ($row = mysqli_fetch_assoc($res)) {
                    if ($row['id'] != 1) {
                        if ($row['root'] == 1) {
                            echo '<div class="tovar"><p style="color: red;">' . $row[login] .
                                '<a style="margin-left: 600px" href="admin.php?set=' . $row['id'] . '">Set admin</a>' .
                                '<a style="margin-left: 25px" href="admin.php?unset=' . $row['id'] . '">Unset admin</a>' .
                                '<a style="margin-left: 25px" href="admin.php?del_user=' . $row['id'] . '">Delete</a>' .
                                '</p></div>';
                        } else {
                            echo '<div class="tovar"><p>' . $row[login] .
                                '<a style="margin-left: 600px" href="admin.php?set=' . $row['id'] . '">Set admin</a>' .
                                '<a style="margin-left: 25px" href="admin.php?unset=' . $row['id'] . '">Unset admin</a>' .
                                '<a style="margin-left: 25px" href="admin.php?del_user=' . $row['id'] . '">Delete</a>' .
                                '</p></div>';
                        }
                    }
                }
                ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['product'])) : ?>
            <div class="content">
                <div class="tovar_add">
                    <h3 align="center">Add new product
                        <h3>
                            <form method="post" action="admin.php" enctype="multipart/form-data">
                                <input type="text" name="name" placeholder="Name product" required>
                                <input type="file" name="img" required>
                                <input style="margin-left: 150px" type="text" name="cost" placeholder="Cost" required>
                                <input type="text" name="info" placeholder="Description" required>
                                <input type="submit" name="add_product" value="Add">
                            </form>
                </div>
                <hr style="width: 90%">
                <div class="tovar_string">
                    <?php
                    $res = mysqli_query($con, SQL_SELECT_BASKET);
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo '<div class="tovar">';
                        echo '<div class="tovar_left_blok">';
                        echo '<div class="tovar_img">';
                        echo '<img src="' . $row[img] . '" style="width:100px; height:100px;">';
                        echo '</div>';
                        echo '<div class="tovar_cost">';
                        echo '<p style="width: 120px">' . '<span>' . "Cost: " . '</span>' . $row[cost] . " $" . '</p>';
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
                        echo '<div class="tovar_button_del_edit">';
                        echo '<p><a href="admin.php?edit=' . $row[id] . '">Edit</a></p>';
                        echo '</div>';
                        echo '<div class="tovar_button_del_edit">';
                        echo '<p style="margin-left: -15px"><a href="admin.php?del=' . $row[name] . '">Delete</a></p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['categories'])) : ?>
            <div class="content">
                <div class="tovar_string">
                    <?php
                    $res = mysqli_query($con, SQL_SELECT_BASKET);
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo '<div class="tovar">';
                        echo '<div class="tovar_left_blok">';
                        echo '<div class="tovar_img">';
                        echo '<img src="' . $row[img] . '" style="width:100px; height:100px;">';
                        echo '</div>';
                        echo '<div class="tovar_cost">';
                        echo '<p style="width: 120px">' . '<span>' . "Cost: " . '</span>' . $row[cost] . " $" . '</p>';
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
                        echo '<p style="margin-top: 0px"><a href="admin.php?cat_id=' . $row[id] . '">Add categories</a></p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                    <p style="color: black; font-size: 20px; margin-left: 30px">Tab to categories to delete</p>
                    <ul style="list-style: none; font-size: 20px;">
                        <?php
                        $cat = mysqli_query($con, "SELECT * FROM categories");
                        $tmp = "";
                        while ($row = mysqli_fetch_assoc($cat)) {
                            if (strcmp($tmp, $row['name_cat'])) {
                                echo '<li><a style="text-decoration: none; color: black" href="admin.php?del_cat=' . $row['name_cat'] . '">' . $row['name_cat'] . '</a></li>';
                                $tmp = $row['name_cat'];
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
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