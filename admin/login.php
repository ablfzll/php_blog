<?php require_once '../config/init.php';?>
<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl">
<head>
    <meta charset="utf-8" />
    <title>ورود به پنل مدیریت</title>
    <meta name="description" content="لاگین page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="assets/css/pages/login/classic/login-5.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/global/plugins.bundle.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.rtl.css?v=7.0.6" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
</head>
<body id="kt_body" class="header-fixed subheader-enabled page-loading">
    <div class="d-flex flex-column flex-root">
        <div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
            <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(assets/media/bg/bg-2.jpg);">
                <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                    <div class="login-signin">
                    <?php 
                        $result = login($_POST);
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            if(isset($_POST['Login']) && $_POST['Login'] == 'login'){
                                if(!$result){
                                    echo '<div class="alert alert-danger w-25 d-flex justify-content-center" style="margin: 10px auto;" role="alert"> خطا در ورود</div>';
                                }else{
                                    echo '<div class="alert alert-success w-25 d-flex justify-content-center" style="margin: 10px auto;" role="alert">ورود موفقیت آمیز </div>';  
                                    sleep(5);
                                    header("location: http://localhost:82/Blog_first/admin/");
                                }
                            }
                        }
                    ?>
                        <div class="mb-20">
                            <h3 class="opacity-40 font-weight-normal">ورود به پنل مدیریت</h3>
                            <p class="opacity-40">نام کاربری و کلمه عبور خود را وارد کنید</p>
                        </div>
                        <form action="" method="post" class="form">
                            <div class="form-group">
                                <input name="admin_username" class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="text" placeholder="نام کاربری" name="username" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <input name="admin_password" class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="password" placeholder="کلمه عبور" name="password" />
                            </div>
                            <div class="form-group text-center mt-10">
                                <button name="Login" value="login" type="submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3">ورود</button>
                            </div>
                        </form>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>