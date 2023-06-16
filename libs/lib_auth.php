<?php

function is_login(){
    return isset($_SESSION['user']) ? true : false;
    // return true;
}

function user_get_by_name($name){
    global $db;
    $sql = "SELECT * FROM `admin` WHERE username = :username";
    $stmt = $db->prepare($sql);
    $stmt->execute([":username" => $_POST['admin_username']]);
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records[0] ?? null;
}

function login($user_pass){
    $user  = user_get_by_name($user_pass['admin_username']);
    if(is_null($user)){
        return false;
    }
    if(password_verify($user_pass['admin_password'],$user->password)){
        $_SESSION['user'] = $user;
        return true;
    }
    // $pass = password_hash($user_pass['admin_username'],PASSWORD_BCRYPT);
    // echo $pass;
}
