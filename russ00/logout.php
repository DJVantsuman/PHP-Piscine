<?php
require_once "install.php";

unset($_SESSION['login']);
unset($_SESSION['id_user']);
header("location:index.php");
?>