<?php
session_start();

if (!isset($_SESSION['nome']) || empty($_SESSION['nome'])) {
    header('Location: ../public/tela_login/.php');
    exit();
}
?>