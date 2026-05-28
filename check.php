<?php
require_once("config.php");
include_page_verify("about", "true","./assets/partition/about.php");
include_page_verify("show_posts", "true","./assets/partition/posts.php");
include_page_verify("admin", "true","dashboard.php",false);
if(check("username","btn","clicked","post")){
    $_SESSION['admin'] = TRUE;
    header("Location:"."dashboard.php");
}elseif(!isset($_SESSION['admin'])){
    include("index.php");
}

// if(isset($_GET['about'] )&& $_GET['about']=="true"){
//     include('./assets/partition/header.php');
//     include("./assets/partition/about.php");
//     include('./assets/partition/footer.php');
//     exit;
   
// }