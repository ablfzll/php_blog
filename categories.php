<?php 
include './config/init.php';
$categories = get_categories();

if(isset($_GET['cat_id']) && is_numeric($_GET['cat_id'])){
    $cat_id = $_GET['cat_id'];
    $getPostByCat = get_cat_by_id($cat_id);
}
include './tpl/categories.php';