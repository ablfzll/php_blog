                        <?php include('./nav.php');?>
                        <?php 
                            if($_GET['delete'] && is_numeric($_GET['delete'])){
                                delete_post($_GET['delete']);
                            }
                        ?>
                        <div class="content flex-column-fluid" id="kt_content">

                            <div class="card card-custom card-stretch" id="kt_page_stretched_card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">پست های وبلاگ را مدیریت کنید</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                <div class="table-responsive">
                                            <table class="table table-bordered table-checkable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>عنوان پست</th>
                                                        <th>دسته بندی</th>
                                                        <th>نویسنده پست</th>
                                                        <th>تصویر</th>
                                                        <th>برچسب</th>
                                                        <th>تاریخ درج</th>
                                                        <th>عملیات</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    <?php if(get_posts()):?>
                                                    <?php foreach($posts = get_posts() as $post):?>
                                                    <tr>
                                                        <td></td>
                                                        <td><a target="_blank" href='http://localhost:82/Blog_first/post.php?post_id=<?= $post->post_id?>'><?= $post->post_title?></a></td>
                                                        <td><?= show_cat_by_id($post->post_category_id) ?></td>
                                                        <td><?= $post->post_author?></td>
                                                        <td><img width="160px" height="90px" src="../images/<?=$post->post_img ?>" alt=""></td>
                                                        <td><?= $post->post_tag?></td>
                                                        <td><?= $post->post_created_at?></td>
                                                        <td>
                                                        <a href="EditPost.php?edit=<?=$post->post_id?>" class="btn btn-success">ویرایش</a>
                                                        <a href="Posts.php?delete=<?=$post->post_id?>" class="btn btn-danger">حذف</a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach?>
                                                    <?php else:?>
                                                        <td colspan="3" class="alert alert-info">دسته ای وجود ندارد</td>
                                                    <?php endif?>
                                                    </tbody>
                                            </table>
                                            </div>
                                </div>
                            </div>
                        </div>
                      <?php include('./footer.php');?>
