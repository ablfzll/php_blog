<?php
include './config/init.php';
$categories = get_categories();
if(isset($_GET['post_id']) && is_numeric($_GET['post_id'])){
    $post_id = $_GET['post_id'];
    $post = get_post_by_id($post_id);
    $comments = get_post_comment($post_id);
}
if(isset($_POST['comment_email']) && !empty($_POST['comment_email'])){
    $comment_params = $_POST;
    $addComment = add_post_comment($post_id,$comment_params);
}
include './tpl/post.php';