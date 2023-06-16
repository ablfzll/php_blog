<?php

session_start();
include 'constants.php';
include BASE_PATH . 'config/config.php';

$db = "mysql:dbname={$dbs->dbname};host={$dbs->host}";
$user = "{$dbs->username}";
$password = "{$dbs->password}";

try{
    $db = new PDO($db, $user, $password);
}catch (PDOException $e){
    die('connection failed : ' . $e->getMessage());
}

include BASE_PATH . 'libs/lib_post.php';
include BASE_PATH . 'libs/lib_categories.php';
include BASE_PATH . 'libs/lib_comments.php';
include BASE_PATH . 'libs/lib_auth.php';