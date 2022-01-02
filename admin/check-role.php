<?php
    if(!isset($_SESSION['role'])){
        header('location:../sign-in');
        exit;
    }