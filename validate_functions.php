<?php
function check($val){
    $val = strip_tags($val);
    $val = htmlspecialchars($val);
    $val = trim($val);
    if(empty($val)){
        echo "check_error";
        die();
    }
    return $val;
}

function equal($val1, $val2){
    if($val1 === $val2){
        return true;
    }else{
        echo "equal_error";
        die();
    }
}
?>