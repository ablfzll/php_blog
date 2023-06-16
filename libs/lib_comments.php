<?php

function get_post_comment($comment_id){
    global $db;
    $sql = "SELECT * FROM comment where commen_status = 1 and comment_post_id = ? and comment_reply = 0";
    $stmt = $db->prepare($sql);
    $stmt->execute([$comment_id]);
    return $stmt->fetchAll(PDO::FETCH_OBJ);
    // return false;
}


function get_commnent_reply($comment_id){
    global $db;
    $sql = "SELECT * FROM comment WHERE comment_reply = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$comment_id]);
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function add_post_comment($post_id , $comment_data){
    global $db;
    $sql = "INSERT INTO comment (comment_post_id, comment_auther, comment_body, comment_email) VALUES (:comment_post_id, :comment_auther, :comment_body , :comment_email)";
    $stmt = $db->prepare($sql);
    $stmt->execute(['comment_post_id' =>$post_id , 'comment_auther' => $comment_data['comment_author'] , 'comment_body' => $comment_data['comment_body'] , 'comment_email' => $comment_data['comment_email']]);
    return $stmt->rowCount();
}

function get_all_comment(){
    global $db;
    $sql = "SELECT * FROM comment ";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
    // return false;
}


function comment_status($data){
    if(isset($data['confirm']) && !empty($data['confirm']) && is_numeric($data['confirm'])){
        global $db;
        $sql = "UPDATE `comment` SET `commen_status`= 1 WHERE comment_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$data['confirm']]);
        return $stmt->rowCount();
    }
    if(isset($data['reject']) && !empty($data['reject']) && is_numeric($data['reject'])){
        global $db;
        $sql = "UPDATE `comment` SET `commen_status`= 0 WHERE comment_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$data['reject']]);
        return $stmt->rowCount();
    }
    if(isset($data['delete']) && !empty($data['delete']) && is_numeric($data['delete'])){
        global $db;
        $sql = "DELETE FROM `comment` WHERE comment_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$data['delete']]);
        return $stmt->rowCount();
    }
}

function get_comment_by_id($comment_id){
    global $db;
    $sql = "SELECT * FROM comment where comment_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$comment_id]);
    return $stmt->fetch(PDO::FETCH_OBJ);
    // return false;
}


function reply_comment($comment_id , $comment_data){
    if(isset($comment_data['sendReplyComment']) && $comment_data['sendReplyComment'] == 'sendReplyComment'){
        global $db;
        $comment_auther = 'ادمین';
        $comment_email = 'admin@gmail.com';
        $commentId = get_comment_by_id($comment_id['comment_id'])->comment_post_id;
        $sql = "INSERT INTO `comment`(`comment_post_id`, `comment_auther`, `comment_body`, `commen_status`, `comment_email`, `comment_reply`) VALUES (:comment_post_id, :comment_auther, :comment_body , :commen_status , :comment_email , :comment_reply)";
        $stmt = $db->prepare($sql);
        $stmt->execute(['comment_post_id' =>$commentId , 'comment_auther' => $comment_auther , 'comment_body' => $comment_data['comment_body'] , ':commen_status'=> 1 , 'comment_email' => $comment_email , 'comment_reply' => $comment_id['comment_id']]);
        return $stmt->rowCount();
        // var_dump($comment_data , $commentId);
    }
}