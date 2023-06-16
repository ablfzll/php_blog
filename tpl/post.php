<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>بلاگ</title>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css?v=<?= rand(10,99999) ?>">
    <link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">وبلاگ من</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= BASE_URL?>">خانه</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">درباره من</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            دسته بندی
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach($categories as $cat):?>
                            <li><a class='dropdown-item' href='categories.php?cate_id=<?=$cat->cat_id?>'><?=$cat->cat_title?></a></li>
                            <?php endforeach?>
                        </ul>
                    </li>
                </ul>
                <div class="search-box">
                    <input class="form-control me-2 hhhh" id="search" name="search" type="text" placeholder="جستجو کردن در وبلاگ" aria-label="Search">
                    <div class="clear"></div>
                    <div class="search-results" style="display: none;">
                                <!-- <div class="result-item" data-lat='111' data-lng='222'>
                                <span class="loc-type">رستوران</span>
                                <span class="loc-title">رستوران و قوه خانه سنتی سون لرن</span> -->
                </div>
          </div>
            </div>
        </div>
    </nav>

    <section class="home py-5" id="home">
        <div class="container-lg">
            <div class="row align-items-center align-content-center">
                <div class="col-md-12 mt-4 mt-md-0">
                    <?php if($post):?>
                    <?php foreach($post as $p):?>
                    <div class="home-img text-center bg-secondary py-4">
                        <img src="./images/<?= $p->post_img?>" width="250px" height="250px"
                            class="rounded-circle mx-auto d-block" alt="profile img">
                    </div>
                    <?php endforeach?>
                    <?php endif?>
                </div>
            </div>
            <div class="row align-items-center align-content-center">
                <div class="row row-cols-12 row-cols-md-12 g-3">
                    <?php if($post):?>
                    <?php foreach($post as $p):?>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center text-primary">
                                <?=$p->post_title?>
                                </h5>
                                <hr>
                                <p class="card-text">
                                    <?=$p->post_body?>
                                </p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">نویسنده مطلب :<?=$p->post_body?>
                                </small>
                                <small class="text-muted text-crate"> تاریخ انتشار :<?=$p->post_created_at?>
                                </small>
                            </div>
                        </div>
                    </div>
                    <?php endforeach?>
                    <?php else:?>
                    <p class="alert alert-info text-center">این مطلب وجود ندارد</p>
                    <?php endif?>

                </div>
            </div>
        </div>

    </section>

    <div class="container mt-5 py-4">
        <div class="alert alert-success text-center">بخش نظرات</div>
        <div class="jumbotron">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                <?php if($comments):?>
                <?php foreach($comments as $comment):?>
                    <div class="card p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="user d-flex flex-row align-items-center"> <img src="./assets/img/user.png"
                                    width="30" class="user-img rounded-circle mr-2">
                                <span>
                                    <small>کاربر </small>
                                    <small class="font-weight-bold text-primary">
                                    <?= $comment->comment_auther?>
                                    </small>
                                    <small>گفت : </small>
                                </span>
                            </div>
                            <small>
                            <?= $comment->comment_created_at?>
                            </small>
                        </div>
                        <span>
                            <small class="font-weight-bold">
                            <?= $comment->comment_body?>
                            </small>
                        </span>

                    </div>
                    <?php $comment_reply = get_commnent_reply($comment->comment_id);?>
                    <?php if($comment_reply):?>
                    <?php foreach($comment_reply as $reply):?>
                    <div class="card p-4 bg-secondary">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="user d-flex flex-row align-items-center"><img src="./assets/img/admin.png"
                                    width="30" class="user-img rounded-circle mr-2">
                                <span>
                                    <small class="text-light">ادمین</small>
                                    <small class="font-weight-bold text-info">سایت</small>
                                    <small class="text-light">پاسخ داد :</small>
                                </span>
                            </div>
                            <small class="text-light">
                                <?= $reply->comment_created_at?>
                            </small>
                        </div>
                        <span>
                            <small class="font-weight-bold text-light">
                            <?= $reply->comment_body?>
                            </small>
                        </span>
                    </div>
                    <?php endforeach?>
                    <?php endif?>
                <?php endforeach?>
                <?php else:?>
                        <p class="alert alert-info text-center">هنوز نظری برای این پست ثبت نشده است اولین نظر را ارسال کنید
                            </p>
                <?php endif?>
                            
                </div>

                <div class="col-md-4">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="usr">اسم :</label>
                            <input name="comment_author" type="text" class="form-control" id="usr">
                        </div>
                        <div class="form-group">
                            <label for="pwd">ایمیل :</label>
                            <input name="comment_email" type="email" class="form-control" id="pwd">
                        </div>
                        <div class="form-group">
                            <label for="comment">متن نظر:</label>
                            <textarea name="comment_body" class="form-control" rows="5" id="comment"></textarea>
                        </div>
                        <button type="submit" name="sendComment" class="btn btn-primary btn-block mt-3">ارسال
                            نظر</button>
                    </form>
                </div>
            </div>
        </div>
        <footer class="footer border-top py-4">
            <div class="container-lg">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="m-0 text-center text-danger text-muted">طراحی شده با ❤️</p>
                    </div>
                </div>
            </div>
    </div>

    </footer>

    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/jquery-3.7.0.min.js.js"></script>
    <script>
        $('#search').keyup(function(){
            const input = $(this);
            const search_result = $('.search-results')
            search_result.html('درحال جستجو ..');
           $.ajax({
            url: '<?= BASE_URL ?>process/search.php',
            method: 'POST',
            data: {keyword:input.val()},
            success : function(respons){
                search_result.slideDown().html(respons);
            }
           })
        })
        $('body').click(function(){
            const search_result = $('.search-results')
            const input = $('.hhhh')
            search_result.hide();
            input.val('')
        });
    </script>
</body>

</html>
