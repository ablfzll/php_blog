<?php
//user input
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
// $prePage = isset($_GET['per-page']) && $_GET['per-page']<=10 ? (int)$_GET['per-page'] : 6;
$prePage = 6;
//positioning
$start =($page>1) ? ($page * $prePage) - $prePage : 0;



function get_posts(){
    global $db,$prePage,$start,$pages,$error;
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM post LIMIT {$start}, {$prePage}";
    $articles = $db->prepare($sql);
    $articles->execute();
    $articles = $articles->fetchAll(PDO::FETCH_OBJ);
    /*var_dump($articles);*/
    $total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
    $pages = ceil($total / $prePage);

    return $articles;
}

function get_post_by_id($post_id){
    global $db;
    $sql = "SELECT * FROM post WHERE post_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$post_id]);
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}


function search($params){
    global $db;
    $sql = 'SELECT * FROM post WHERE post_title like ?';
    $stmt = $db->prepare($sql);
    $stmt->execute(["%{$params}%"]);
    return $stmt->fetchAll(PDO::FETCH_OBJ);
    // return $params;
}


function admin_add_post($post_info , $post_img){
    global $db;
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['addPost']) && $_POST['addPost'] == 'add'){
            $img_name = null;
            if (isset($_FILES['post_img']) && !empty($_FILES['post_img']['name'])){
                $fileName = $_FILES['post_img']['name'];
                $fileType = $_FILES['post_img']['type'];
                $fileSize = $_FILES['post_img']['size'];
                $fileTempName = $_FILES['post_img']['tmp_name'];
                $fileNameSeprate = explode('.',$fileName);
                $fileNameExtention = strtolower(end($fileNameSeprate));
                $newFileName = md5(time().$fileName) . '.' . $fileNameExtention;
                $img_name = $newFileName;
                $allowdFileExtentions = ['png','jpg'];
                if (in_array($fileNameExtention,$allowdFileExtentions)) {
                    $allowedFileSize = 1 * 1024*1024;
                    if ($fileSize < $allowedFileSize){
                        $upload_path = BASE_PATH . 'images/';
                        $destPath = $upload_path . $newFileName;
                        if (move_uploaded_file($fileTempName,$upload_path . $newFileName)){
                        }else{
                            echo '<div class="alert alert-danger w-25 d-flex justify-content-center" style="margin: 10px auto;" role="alert"> مشکل در اپلود عکس </div>';
                            die;
                        }
                    }else{
                        echo "<div class='alert alert-danger w-25 d-flex justify-content-center' style='margin: 10px auto;' role='alert'> شما مجاز به اپلود فایل با سایز کمتر از $allowedFileSize هستید </div>";
                        die;
                    }
                }else{
                    echo '<div class="alert alert-danger w-25 d-flex justify-content-center" style="margin: 10px auto;" role="alert"> شما مجاز به اپلود این فایل نیستید!! </div>';
                    die;
                }
            }else{
                echo '<div class="alert alert-danger w-25 d-flex justify-content-center" style="margin: 10px auto;" role="alert"> لطفا عکس مورد نظر را انتخاب کنید </div>';
                die;
            }
            $sql = "REPLACE INTO `post` (`post_category_id`, `post_title`, `post_img`, `post_body`, `post_tag`, `post_author`) 
                    VALUES (:post_category_id, :post_title, :post_img, :post_body, :post_tag, :post_author);";
            $stmt = $db->prepare($sql);
            $stmt->execute([':post_category_id'=>$post_info['post_category_id'] , 
            ':post_title'=>$post_info['post_title'] , 
            ':post_img'=> $img_name, 
            ':post_body'=>$post_info['post_body'] , 
            ':post_tag'=>$post_info['post_tags'] , 
            ':post_author'=>$post_info['post_author']]);
            // echo '<pre>';
            // var_dump($post_info);
            // echo '</pre>';
            if($stmt->rowCount()){
                echo '<div class="alert alert-success w-25 d-flex justify-content-center" style="margin: 10px auto;" role="alert"> پست انتشار یافت </div>'; 
                die;
            }else{
                echo '<div class="alert alert-danger w-25 d-flex justify-content-center" style="margin: 10px auto;" role="alert"> پست انتشار نیافت </div>'; 
                die;
            }
        }
    }
}

function admin_update_post($post_info , $post_img,$edit_post_id){
    global $db;
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['updatePost']) && $_POST['updatePost'] == 'update'){
            $img_name = null;
            if (isset($_FILES['post_img']) && !empty($_FILES['post_img']['name'])){
                $fileName = $_FILES['post_img']['name'];
                $fileType = $_FILES['post_img']['type'];
                $fileSize = $_FILES['post_img']['size'];
                $fileTempName = $_FILES['post_img']['tmp_name'];
                $fileNameSeprate = explode('.',$fileName);
                $fileNameExtention = strtolower(end($fileNameSeprate));
                $newFileName = md5(time().$fileName) . '.' . $fileNameExtention;
                $img_name = $newFileName;
                $allowdFileExtentions = ['png','jpg'];
                if (in_array($fileNameExtention,$allowdFileExtentions)) {
                    $allowedFileSize = 1 * 1024*1024;
                    if ($fileSize < $allowedFileSize){
                        $upload_path = BASE_PATH . 'images/';
                        $destPath = $upload_path . $newFileName;
                        if (move_uploaded_file($fileTempName,$upload_path . $newFileName)){
                        }else{
                            echo '<div class="alert alert-danger w-25 d-flex justify-content-center" style="margin: 10px auto;" role="alert"> مشکل در اپلود عکس </div>';
                        }
                    }else{
                        echo "<div class='alert alert-danger w-25 d-flex justify-content-center' style='margin: 10px auto;' role='alert'> شما مجاز به اپلود فایل با سایز کمتر از $allowedFileSize هستید </div>";
                    }
                }else{
                    echo '<div class="alert alert-danger w-25 d-flex justify-content-center" style="margin: 10px auto;" role="alert"> شما مجاز به اپلود این فایل نیستید!! </div>';
                }
            }else{
                echo '<div class="alert alert-danger w-25 d-flex justify-content-center" style="margin: 10px auto;" role="alert"> لطفا عکس مورد نظر را انتخاب کنید </div>';
            }
            $sql = "UPDATE `post` SET `post_category_id`=:post_category_id,`post_title`=:post_title,
            `post_img`=:post_img,`post_body`=:post_body,`post_tag`=:post_tag,
            `post_author`=:post_author WHERE post_id = :post_id";
            $stmt = $db->prepare($sql);
            $stmt->execute([':post_category_id'=>$post_info['post_category_id'] , 
            ':post_title'=>$post_info['post_title'] , 
            ':post_img'=> $img_name, 
            ':post_body'=>$post_info['post_body'] , 
            ':post_tag'=>$post_info['post_tags'] , 
            ':post_author'=>$post_info['post_author'],
            ':post_id'=>$edit_post_id]);
            // echo '<pre>';
            // var_dump($post_info);
            // echo '</pre>';
            if($stmt->rowCount()){
                echo '<div class="alert alert-success w-25 d-flex justify-content-center" style="margin: 10px auto;" role="alert">پست اپدیت شد </div>'; 
                die;
            }else{
                echo '<div class="alert alert-danger w-25 d-flex justify-content-center" style="margin: 10px auto;" role="alert"> پست  اپدیت نشد </div>'; 
                die;
            }
        }
    }
}


function delete_post($post_data){
    global $db;      
    $sql = "DELETE FROM post WHERE post_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$post_data]);
    if($stmt->rowCount()){
        echo '<div class="alert alert-success w-25 d-flex justify-content-center" style="margin: 10px auto;" role="alert"> پاک شد </div>';
        die();
    }else{
        echo '<div class="alert alert-danger w-25 d-flex justify-content-center" style="margin: 10px auto;" role="alert"> پاک نشد!! </div>';
        die();
    }
}

function show_post_by_id($post_id){
    global $db;
    $sql = "SELECT * FROM post WHERE post_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$post_id]);
    $post_title =  $stmt->fetch(PDO::FETCH_OBJ);
    echo $post_title->post_title;
}
