<?php include('./nav.php');?>
<?php $comment = get_comment_by_id($_GET['comment_id']);?>
<?php reply_comment($_GET , $_POST);?>
                       <div class="content flex-column-fluid" id="kt_content">

                                       <div class="card card-custom gutter-b example example-compact">
                                           <div class="card-header">
                                               <h3 class="card-title">
                                               پاسخ به نظر
                                               </h3>
                                           </div>
                                           <div class="card-body">
                                            
                                               <form action="" method="post">
                                           <div class="form-group">
                                                       <label>نام کاربر</label>
                                                       <input disabled  value="<?= $comment->comment_auther?>" type="text" class="form-control form-control-lg"  placeholder="اسم دسته بندی را وارد کنید"/>
                                                   </div>
                                           <div class="form-group">
                                                       <label>ایمیل کاربر</label>
                                                       <input disabled  value="<?= $comment->comment_email?>" type="text" class="form-control form-control-lg"  placeholder="اسم دسته بندی را وارد کنید"/>
                                                   </div>
                                           <div class="form-group">
                                                       <label>متن نظر</label>
                                                       <textarea disabled  class="form-control form-control-lg"><?= $comment->comment_body?></textarea>
                                                   </div>
                                           <div class="form-group">
                                                       <label>پاسخ به نظر</label>
                                                       <textarea name="comment_body" class="form-control form-control-lg"></textarea>
                                                   </div>
                                           </div>
                                           <div class="card-footer">
                                               <button name="sendReplyComment" value="sendReplyComment" type="submit" class="btn btn-success">ویرایش</button>
                                           </div>
                                       </form>
                                       </div>
                                     
</div>


</div>


                       </div>
                      <?php include('./footer.php');?>
