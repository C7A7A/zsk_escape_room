<?php
    session_start();
    require_once('connect.php');
    require_once('validate_functions.php');

    if($_POST){
        if(!isset($_SESSION['user_id'])){
            echo 'logged_error';
            die();
        }

        if(!isset($_POST['time'])){
            echo "check_error";
            die();
        }

        $er = trim($_POST['er']);
        $date = trim($_POST['date']);
        $amount = trim($_POST['amount']);
        $time = trim($_POST['time']);

        check($er);
        check($date);
        check($amount);
        check($time);

        $er = $conn->real_escape_string($er);
        $date = $conn->real_escape_string($date);
        $amount = $conn->real_escape_string($amount);
        $time = $conn->real_escape_string($time);
        
        $query = "SELECT * FROM `escape_rooms` WHERE `Name` = '$er'";
        if($result = $conn->query($query)){
            $row = $result->fetch_assoc();
            // var_dump($row);
            $query_2 = "SELECT * FROM `reservations` WHERE `ID_Escape_Room` = '$row[ID_Escape_Room]' AND `Date` = '$date' AND `Time` = '$time'";
            $result_2 = $conn->query($query_2);
            $row2 = $result_2->fetch_assoc();
            // print_r($query_2);
            if($result_2->num_rows == 0){
                $price = $row['Price'] * $amount;

                $query_3 = "INSERT INTO `reservations`(`ID_User`, `ID_Escape_Room`, `Date`, `Time`, `Amount`, `Price`) 
                            VALUES ('$_SESSION[user_id]','$row[ID_Escape_Room]','$date', '$time', '$amount', '$price')";
                if($result_3 = $conn->query($query_3)){
                    echo 'success';
                    $conn->close();
                    die();
                }else{
                    echo "query_error";
                    die();
                }
            }else{
                echo "reserved_error";
                die();
            }
        }else{
            echo "query_error";
            die();
        }
    }else{
        header('location ./index.php');
        die();
    }
?>