<?php
    if(isset($_POST['full_date'])){
        session_start();
        $_SESSION['full_date'] = trim($_POST['full_date']);
        echo 'success';
        die();
    }else{
        header('location: ./index.php');
        die();
    }
?>