<?php
session_start();

$correctUser = "user_ipssi";
$correctPass = "Welcome2025!";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $user = $_POST["user"] ?? "";
    $pass = $_POST["mdp"] ?? "";

    if ($user === $correctUser && $pass === $correctPass) {
        $_SESSION["connected"] = true;
        header("Location: index.php");
        exit;
    } else {
        header("Location: login.php?error=1");
        exit;
    }
}