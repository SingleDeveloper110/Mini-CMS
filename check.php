<?php
require_once("config.php");
include_page_verify("about", "true", "./assets/partition/about.php");
include_page_verify("show_posts", "true", "./assets/partition/posts.php");
include_page_verify("admin", "true", "dashboard.php", false);
if (check("username", "btn", "clicked", "post")) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    var_dump(add_user($username, $password));
    if (add_user($username, $password)) {
        $id = get_user_id($username);
        var_dump($id);
        if($id){
            $_SESSION["Current_user"] = $id["ID"];
        }
        
        header("Location:" . "dashboard.php");
    } else {
        include_once('index.php');
    }


} elseif (!isset($_SESSION['admin'])) {
    include_once('index.php');
}

// if(isset($_GET['about'] )&& $_GET['about']=="true"){
//     include('./assets/partition/header.php');
//     include("./assets/partition/about.php");
//     include('./assets/partition/footer.php');
//     exit;

// }