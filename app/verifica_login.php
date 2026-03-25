<?php
    if(!$_SESSION['nome']){
        header('Location: ../public/index.php');
        exit();
    }
?>