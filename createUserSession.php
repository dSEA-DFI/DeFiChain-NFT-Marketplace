<?php
session_start();
$action = $_POST['action'];

if($action == "login"){
    if(isset($_POST['address'])){
        
            $_SESSION['address'] = "";
            $_SESSION['address'] = $_POST['address'];
            echo json_encode("SET");
        
    }else{
        echo json_encode("UNSET");
    }
}

if($action == "logout"){
    echo json_encode("UNSET");
    session_destroy();
}

?>