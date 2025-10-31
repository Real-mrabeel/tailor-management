<?php
include 'config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$conn->query("DELETE FROM students WHERE id=$id");
header("Location: index.php");
?>
