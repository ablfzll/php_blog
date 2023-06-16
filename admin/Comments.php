<?php include('./nav.php');?>

<?php comment_status($_GET);?>
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
                                                        <th>پست</th>
                                                        <th>نام</th>
                                                        <th>ایمیل</th>
                                                        <th>متن نظر</th>
                                                        <th>تاریخ</th>
                                                        <th>وضعیت</th>
                                                        <th>پاسخ</th>
                                                        <th>عملیات</th>
                                                    </tr>
                                                </thead>
                         
                                                <tbody>
                                                    <?php if(get_all_comment()):?>
                                                    <?php foreach($comments = get_all_comment() as $com):?>
                                                    <tr>
                                                        <td></td>
                                                        <td><a href="http://localhost:82/Blog_first/post.php?post_id=<?=$com->comment_post_id?>"><?= show_post_by_id($com->comment_post_id)?></a></td>
                                                        <td><?= $com->comment_auther?></td>
                                                        <td><?= $com->comment_email?></td>
                                                        <td><?= $com->comment_body?></td>
                                                        <td><?= $com->comment_created_at?></td>
                        
                                                        <td>
                           
                                <a class="btn btn-success" href="Comments.php?confirm=<?=$com->comment_id?>">تایید
                                    نظر</a>
                                <?php if($com->commen_status == 1):?>
                                    <a class="btn btn-danger" href="Comments.php?reject=<?=$com->comment_id?>">رد نظر</a>
                                <?php endif?>
                            </td>
                            <td>
                                <a class="btn btn-info" href="ReplyComment.php?comment_id=<?=$com->comment_id?>">پاسخ
                                    به نظر</a>
                           
                        </td>
                                                        <td>
                                                        <a href="Comments.php?delete=<?=$com->comment_id?>" class="btn btn-danger">حذف</a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach?>
                                                    <?php else:?>
                                                        <td colspan="3" class="alert alert-info">هیچ نظری در وبلاگ ثبت نشده است</td>
                                                    <?php endif?>
                                                    </tbody>
                                            </table>
                                            </div>
                                </div>
                            </div>
                        </div>
                      <?php include('./footer.php');?>
