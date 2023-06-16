<?php include('./nav.php');?>
                       
                       <div class="content flex-column-fluid" id="kt_content">

                                       <div class="card card-custom gutter-b example example-compact">
                                           <div class="card-header">
                                               <h3 class="card-title">
                                               ویرایش نظر
                                               </h3>
                                           </div>
                                           <div class="card-body">
                                               <form action="" method="post">
                                           <div class="form-group">
                                           <input type="hidden" value="" class="textbox" name="comment_id">
                                                       <label>نام کاربر</label>
                                                       <input disabled name="cate_title" value="" type="text" class="form-control form-control-lg"  placeholder="اسم دسته بندی را وارد کنید"/>
                                                   </div>
                                           <div class="form-group">
                                                       <label>ایمیل کاربر</label>
                                                       <input disabled name="cate_title" value="" type="text" class="form-control form-control-lg"  placeholder="اسم دسته بندی را وارد کنید"/>
                                                   </div>
                                           <div class="form-group">
                                                       <label>متن نظر</label>
                                                       <textarea name="comment_body" class="form-control form-control-lg"></textarea>
                                                   </div>
                                           </div>
                                           <div class="card-footer">
                                               <button name="editComment" type="submit" class="btn btn-success">ویرایش</button>
                                           </div>
                                       </form>
                                       </div>
                                     
</div>


</div>


                       </div>
                      <?php include('./footer.php');?>
