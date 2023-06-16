<?php


function get_categories(){
    global $db;
    $sql = "SELECT * FROM categories;";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function get_cat_by_id($cat_id){
    global $db,$prePage,$start,$pages,$error;
    $sql = "SELECT SQL_CALC_FOUND_ROWS * from post WHERE post_category_id = ? LIMIT {$start}, {$prePage}";
    $articles = $db->prepare($sql);
    $articles->execute([$cat_id]);
    $articles = $articles->fetchAll(PDO::FETCH_OBJ);
    /*var_dump($articles);*/
    $total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
    $pages = ceil($total / $prePage);

    return $articles;
}

function show_cat_by_id($id){
    global $db;
    $sql = "SELECT * FROM categories where cat_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
    $cat_name = $stmt->fetch(PDO::FETCH_OBJ);
    echo $cat_name->cat_title;
}

function create_categories($cat_name){
    
    if(isset($cat_name['insertCategory']) && $cat_name['insertCategory'] == 'insertCategory'){
        if(isset($cat_name['cate_title']) && !empty($cat_name['cate_title'])){
            global $db;
            $stm = $db->prepare('SELECT * FROM categories where cat_title = ?');
            $stm->execute([$cat_name['cate_title']]);
            if($stm->rowCount()){
                echo '<div class="alert alert-danger w-25 d-flex justify-content-center" style="margin: 10px auto;" role="alert">وجود دارد </div>';
                exit();
            }
            $sql = "INSERT INTO categories (cat_title) VALUES (:cat_title)";
            $stmt = $db->prepare($sql);
            $stmt->execute([":cat_title"=>$cat_name['cate_title']]);
            if($stmt->rowCount()){
                echo '<div class="alert alert-success w-25 d-flex justify-content-center" style="margin: 10px auto;" role="alert"> ایجاد شد </div>'; 
                die();
            }else{
                echo '<div class="alert alert-danger w-25 d-flex justify-content-center" style="margin: 10px auto;" role="alert"> ایجاد نشد!! </div>'; 
                die();
            }
        }
    }
}

function update_categories($cat_data){
    if(isset($cat_data['editCategory']) && $cat_data['editCategory'] == 'editCategory'){
        if(isset($cat_data['cate_title']) && !empty($cat_data['cate_title'])){
            global $db;
            
            $sql = "UPDATE `categories` SET cat_title = :cat_title WHERE cat_id = :cat_id";
            $stmt = $db->prepare($sql);
            $stmt->execute([":cat_title"=>$cat_data['cate_title'] , ":cat_id"=>$cat_data['cate_id']]);
            if($stmt->rowCount()){
                echo '<div class="alert alert-success w-25 d-flex justify-content-center" style="margin: 10px auto;" role="alert"> ویرایش شد </div>'; 
                die();
            }else{
                echo '<div class="alert alert-danger w-25 d-flex justify-content-center" style="margin: 10px auto;" role="alert"> ویرایش نشد!! </div>'; 
                die();
            }        
        }
    }
}

function delete_cat($cate_data){
    global $db;      
    $sql = "DELETE FROM categories WHERE cat_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([    $cate_data]);
    if($stmt->rowCount()){
        echo '<div class="alert alert-success w-25 d-flex justify-content-center" style="margin: 10px auto;" role="alert"> پاک شد </div>';
        die();
    }else{
        echo '<div class="alert alert-danger w-25 d-flex justify-content-center" style="margin: 10px auto;" role="alert"> پاک نشد!! </div>';
        die();
    }
}