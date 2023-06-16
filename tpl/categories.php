<!doctype html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>بلاگ</title>
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css">
</head>

<body class="bg-light">
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">وبلاگ من</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              دسته بندی
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php foreach($categories as $cat):?>
                <li><a class='dropdown-item' href='categories.php?cat_id=<?= $cat->cat_id?>'><?= $cat->cat_title?></a></li>
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
          <div class="home-img text-center bg-secondary py-4">
            <img src="assets/img/profile.jpg" width="250px" height="250px" class="rounded-circle mx-auto d-block" alt="profile img">
          </div>
        </div>
        </div>
        <div class="row align-items-center align-content-center">
        <div class="col-md-12 mt-4 mt-md-0">
          <h3 class="text-muted py-4 text-center">خوش آمدید به وبلاگ من</h3>
          <div class="text-center py-4 ">
          <?php foreach($categories as $cat):?>
          <a class='btn btn-outline-secondary m-1' href='categories.php?cat_id=<?= $cat->cat_id?>'><?= $cat->cat_title?></a>
          <?php endforeach?>
          </div>
        </div>
      </div>
      <div class="row align-items-center align-content-center">
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <?php if($getPostByCat):?>
          <?php foreach($getPostByCat as $post):?>
          <div class="col">
            <div class="card h-100">
              <img src="./images/<?= $post->post_img?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><a href="post.php?post_id=<?=$post->post_id?>">
                <?= $post->post_title?>
                </a></h5>
                <hr>
                <p class="card-text">
                <?= $post->post_body?>
                </p>
                <a href="post.php?post_id=<?= $post->post_id?>" target="_blank" type="button" class="btn btn-outline-secondary btn-block">ادامه مطلب</a>
              </div>
              <div class="card-footer">
                <small class="text-muted">نویسنده مطلب : <?= $post->post_title?></small>
                <small class="text-muted text-crate"> تاریخ انتشار : <?= $post->post_created_at?></small>
              </div>
            </div>
          </div>
          <?php endforeach?>
          <?php else:?>
            <p class="alert alert-danger center-block text-center">هیچ مطلبی برای این دسته بندی درج نشده است</p>
          <?php endif?>
        </div>
      </div>
    </div>
    <nav aria-label="Page navigation example" class="center">
            <ul class="pagination">
            <?php for($x = 1; $x<=$pages; $x++):  ?>
                <li class="page-item <?= $page ===$x ?'active' :'' ?>"><a class="page-link" href="?page=<?php echo $x; ?>&cat_id=<?=$_GET['cat_id']?>"><?php echo $x;?></a></li>
            <?php endfor;  ?>
            </ul>
    </nav>
  </section>
  <footer class="footer border-top py-4">
    <div class="container-lg">
      <div class="row">
        <div class="col-lg-12">
          <p class="m-0 text-center text-danger text-muted">طراحی شده با ❤️</p>
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
