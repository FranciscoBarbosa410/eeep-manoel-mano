<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: ../public/tela_login/.php');
    exit();
}
?>
