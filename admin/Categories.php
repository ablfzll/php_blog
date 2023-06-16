<?php include('./nav.php');?>
<?php 
    if($_GET['delete'] && is_numeric($_GET['delete'])){
        delete_cat($_GET['delete']);
    }
?>
<div class="content flex-column-fluid" id="kt_content">

                                        <div class="card card-custom gutter-b example example-compact">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                دسته بندی ایجاد کنید
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <?php create_categories($_POST);?>
                                                <form action="" method="post">
                                            <div class="form-group">
                                                        <label>دسته بندی</label>
                                                        <input name="cate_title" type="text" class="form-control form-control-lg"  placeholder="اسم دسته بندی را وارد کنید"/>
                                                    </div>
                                            </div>
                                            <div class="card-footer">
                                                <button name="insertCategory" value="insertCategory" type="submit" class="btn btn-success">ایجاد</button>
                                            </div>
                                        </form>
                                        </div>
                                        <div class="row">
                                <div class="col-xl-12">
                                    <div class="card card-custom gutter-b">
                                        <div class="card-header flex-wrap py-3">
                                            <div class="card-title">
                                                <h3 class="card-label">
			                                	لیست دسته بندی ها
		                                    	</h3>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <div class="table-responsive">
                                            <table class="table table-bordered table-checkable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>نام دسته بندی</th>
                                                        <th>عملیات</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php if(get_categories()):?>
                                                    <?php foreach($cate = get_categories() as $index => $value):?>
                                                    <tr>
                                                        <td><?= $index + 1?></td>
                                                        <td><?= $value->cat_title ?></td>
                                                        <td>
                                                            <a href="EditCategory.php?edit=<?= $value->cat_id?>" class="btn btn-success">ویرایش</a>
                                                            <a href="Categories.php?delete=<?= $value->cat_id?>" class="btn btn-danger">حذف</a>
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
                            </div>
                            </div>
                           </div>
                        </div>
                       <?php include('./footer.php');?>
