<?php
    session_start();
    require_once('connect.php');
    require_once('validate_functions.php');

    if($_POST){
        $email = $_POST['email_login'];
        $password = $_POST['password_login'];

        check($email);
        check($password);

        $email = $conn->real_escape_string($email);
        $password = $conn->real_escape_string($password);

        $query = "SELECT * FROM `users` WHERE `email` = '$email'";
        if($result = $conn->query($query)){
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                    if(password_verify($password, $row['Pass'])){
                        $_SESSION['logged'] = true;
                        $_SESSION['name'] = $row['Name'];
                        $_SESSION['email'] = $row["Email"];
                        $_SESSION['user_id'] = $row['ID_User'];
                        echo 'success';
                        $conn->close();
                        die();
                }else{
                    echo 'equal_error';
                    die();
                }
            }else{
                echo 'equal_error';
                die();
            }
        }else{
            echo 'query_error';
            die();
        }
    }else{
        header('location: ./index.php');
        die();
    }
?>