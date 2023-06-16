<?php
include './config/init.php';
$posts = get_posts();
$categories = get_categories();

include './tpl/index.php';