<?php
include "koneksi.php";
session_start();
$login = $_SESSION['login'];
if ($login == "admin") {
	header("location:../admin/login.php");
} elseif ($login == "user") {
	header("locatiom:user/home.php");
} else {
	header("location:login.php");
}
?>