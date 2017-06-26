<?php
require_once "sql.php";
session_start();
$con = mysqli_connect("localhost", "root", "111111");
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}
mysqli_query($con, "CREATE DATABASE IF NOT EXISTS rush_db");
$con = mysqli_connect("localhost", "root", "111111", "rush_db");
mysqli_query($con, SQL_CREATE_TABLE_USER);
mysqli_query($con, SQL_CREATE_TABLE_BASKET);
mysqli_query($con, SQL_CREATE_TABLE_CATEGORIES);

$res = mysqli_query($con, SQL_SELECT_USER);

if (mysqli_num_rows($res) === 0) {
	$passwd = hash("md5", "admin");
	mysqli_query($con, "INSERT INTO user (login, password, root) VALUES ('admin', '$passwd', 1)");
	mysqli_query($con, SQL_CREATE_PROD_1);
    mysqli_query($con, SQL_CREATE_PROD_2);
    mysqli_query($con, SQL_CREATE_PROD_3);
    mysqli_query($con, SQL_CREATE_PROD_4);
    mysqli_query($con, SQL_CREATE_PROD_5);
    mysqli_query($con, SQL_CREATE_PROD_6);
    mysqli_query($con, SQL_CREATE_PROD_7);
    mysqli_query($con, SQL_CREATE_PROD_8);
    mysqli_query($con, SQL_CREATE_PROD_9);
    mysqli_query($con, SQL_CREATE_CATEGORIES_1);
    mysqli_query($con, SQL_CREATE_CATEGORIES_2);
    mysqli_query($con, SQL_CREATE_CATEGORIES_3);
    mysqli_query($con, SQL_CREATE_CATEGORIES_4);
    mysqli_query($con, SQL_CREATE_CATEGORIES_5);
    mysqli_query($con, SQL_CREATE_CATEGORIES_6);
    mysqli_query($con, SQL_CREATE_CATEGORIES_7);
    mysqli_query($con, SQL_CREATE_CATEGORIES_8);
    mysqli_query($con, SQL_CREATE_CATEGORIES_9);
}

?>