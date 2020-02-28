<?php
    session_start();
    require_once('validate_functions.php');
    require_once('connect.php');

    if(isset($_SESSION['logged']) && $_SESSION['logged'] = true){
        if($_POST){
            $topic = $_POST['topic'];
            $content = $_POST['content'];
            $user_id = $_SESSION['user_id'];
            // print_r($user_id);

            check($topic);
            check($content);

            $topic = $conn->real_escape_string($topic);
            $content = $conn->real_escape_string($content);
            
            $query = "INSERT INTO `messages`(`ID_User`, `Subject`, `Message`) VALUES ('$user_id', '$topic', '$content')";
            if($result = $conn->query($query)){
                echo 'success';
                $conn->close();
                die();
            }else{  
                echo 'query_error';
                die();
            }
        }else{
            header('location: ./index.php');
            die();
        }
    }else{
        echo "logged_error";
    }   
?>