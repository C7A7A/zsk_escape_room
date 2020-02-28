<?php
    if(isset($_GET['reservation_month']) && isset($_GET['reservation_er'])){
        session_start();
        $_SESSION['month'] = $_GET['reservation_month'];
        $_SESSION['er'] = $_GET['reservation_er'];
        header('location: ./index.php');
        die();
    }
    else{
        header('location: ./index.php');
    }
?>