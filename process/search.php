<?php
include '../config/init.php';

function checkRequest(){
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
        return true;
    }
    return false;
}

if(!checkRequest()){
    echo 'request is not ajax';
    die();
}

$keyword = $_POST['keyword'];
if(isset($keyword) && !empty($keyword)){
    // die('نتیجه ای یافت نشد!');
    $search = search($keyword);
}
if(sizeof($search) == 0){
    die('نتیجه ای یافت نشد!');
}
$categories = get_categories();

foreach($search as $s){
    echo "<a class='last' href='".BASE_URL."post.php?post_id=$s->post_id'><div class='result-item'>
            <span class='loc-title'>$s->post_title</span>
        </div></a>";
}
