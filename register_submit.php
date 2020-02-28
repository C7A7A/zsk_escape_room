<?php
    require_once('connect.php');
    require_once('validate_functions.php');
    
    if($_POST){
        $name = $_POST['name_register'];
        $email = $_POST['email_register'];
        $email_confirm = $_POST['email_confirm'];
        $password = $_POST['password_register'];
        $password_confirm = $_POST['password_confirm'];

        check($name);
        check($email);
        check($password);

        equal($email, $email_confirm);
        equal($password, $password_confirm);

        
        $name = $conn->real_escape_string($name);
        $email = $conn->real_escape_string($email);
        $password = $conn->real_escape_string($password);
  
        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = "SELECT `email` FROM `users` WHERE `email` = '$email'";
        if($result = $conn->query($query)){
            if($result->num_rows == 0){
                $query_2 = "INSERT INTO `users`(`Email`, `Pass`, `Name`) VALUES ('$email','$password','$name')";
                $conn->query($query_2);
                echo 'success';
                $conn->close();
                die();
            }else{
                echo 'same_email';
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