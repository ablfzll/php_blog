<?php include('./nav.php');?>
                       <div class="content flex-column-fluid" id="kt_content">
                                    <?php admin_update_post($_POST,$_FILES,$_GET['edit']);?>
                                       <div class="card card-custom gutter-b example example-compact">
                                           <div class="card-header">
                                               <h3 class="card-title">
                                               ویرایش مطلب
                                               </h3>
                                           </div>
                                           <form action="" method="post" enctype="multipart/form-data" class="form">
                                    <div class="card-body">
                                        <div class="form-group form-group-last">
                                        </div>
                                        <div class="form-group">
                                            <label>عنوان پست</label>
                                            <input name="post_title" value="" type="text" class="form-control form-control-solid" placeholder="عنوان پست را وارد کنید" required>
                                        </div>
                                        <div class="form-group">
                                            <label>نویسنده پست</label>
                                            <input name="post_author" value="" type="text" class="form-control form-control-solid" placeholder="نام نویسنده را وارد کنید" required>
                                        </div>
                                        <div class="form-group">
                                            <label>انتخاب دسته بندی</label>
                                            <select name="post_category_id" class="form-control form-control-solid" required>
                                                <?php foreach($categories = get_categories() as $cat):?>
                                                    <option value="<?=$cat->cat_id?>"><?=$cat->cat_title?></option>
                                                <?php endforeach?>
                                        
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for=""> توضیحات پست</label>
                                            <input type="hidden" name="post_id" value="" class="textbox" placeholder="">
                                            <textarea name="post_body" class="form-control form-control-solid" rows="5"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>تگ های پست</label>
                                            <input name="post_tags" value="" type="text" class="form-control form-control-solid" placeholder="تگ پست را وارد کنید" />
                                        </div>
                                        <div class="form-group">
                                        <?php foreach($post = get_post_by_id($_GET['edit']) as $p):;?>
                                        <img width="200px" height="110px" src="../images/<?= $p->post_img; ?>" alt="">
                                        <?php endforeach?>
                                            <input name="post_img" value="" type="file" class="form-control form-control-solid" placeholder="تگ پست را وارد کنید" />
                                        </div>
                                    </div>
                                           <div class="card-footer">
                                               <button name="updatePost" value="update" type="submit" class="btn btn-success">ویرایش</button>
                                           </div>
                                       </form>
                                       </div>
                                     
</div>


</div>


                       </div>
                      <?php include('./footer.php');?>
