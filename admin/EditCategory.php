<?php include('./nav.php');?>
                       <div class="content flex-column-fluid" id="kt_content">

                                       <div class="card card-custom gutter-b example example-compact">
                                           <div class="card-header">
                                               <h3 class="card-title">
                                               ویرایش دسته بندی
                                               </h3>
                                           </div>
                                           <div class="card-body">
                                               <form action="" method="post">
                                               <?php update_categories($_POST);?>
                                           <div class="form-group">
                                                       <label>دسته بندی</label>
                                                       <input name="cate_title" value="" type="text" class="form-control form-control-lg"  placeholder="اسم دسته بندی را وارد کنید"/>
                                                       <input type="hidden" name="cate_id" value="<?= $_GET['edit']?>" placeholder="">
                                                   </div>
                                           </div>
                                           <div class="card-footer">
                                               <button name="editCategory" value="editCategory" type="submit" class="btn btn-success">ویرایش</button>
                                           </div>
                                       </form>
                                       </div>
                                     
</div>


</div>


                       </div>
                      <?php include('./footer.php');?>
