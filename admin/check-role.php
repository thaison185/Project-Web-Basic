<?php
    if(!isset($_SESSION['role'])){
        header('location:./login.php');
        exit;
    }