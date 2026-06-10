<?php
function include_page_verify($url_verify, $value_verify, $page_path, $header_footer = true)
{
    if ($header_footer) {
        if (isset($_GET["$url_verify"]) && $_GET["$url_verify"] == "$value_verify") {
            include('./assets/partition/header.php');
            include("$page_path");
            include('./assets/partition/footer.php');
            exit;

        }
    } else {
        if (isset($_GET["$url_verify"]) && $_GET["$url_verify"] == "$value_verify") {
            include("$page_path");

            exit;

        }
    }

}
function include_page($page_path)
{

    include('./assets/partition/header.php');
    include("$page_path");
    include('./assets/partition/footer.php');
    exit;

}

function check($name, $btn, $value_btn, $method)
{
    $method_lower = strtolower($method);
    if ($method_lower == "post") {
        if (isset($_POST[$name]) && $_POST[$btn] == $value_btn) {
            return "true";

        } else {
            return false;
        }
    } elseif ($method_lower == "get") {
        if (isset($_GET[$name]) && $_GET[$btn] == $value_btn) {
            return "true";

        } else {
            return "false";
        }
    } else {
        return "ERRRROR";
    }
}

function save_data($filename, $ext, $nametosave, $path, $post_title, $post_desc)
{

    $filename = $_FILES["image"]["tmp_name"];

    @$ext = end(explode("/", $_FILES["image"]["type"]));

    $nametosave = random_str(5) . "." . $ext;

    if (!file_exists("./assets/uploads/" . date("Y-m-d"))) {
        mkdir("./assets/uploads/" . date("Y-m-d"));
    }

    $path = "./assets/uploads/" . date("Y-m-d");

    move_uploaded_file(
        $filename,
        strval($path . "/") . $nametosave
    );

    if (!add_post($post_title, $post_desc, $path . "/" . $nametosave)) {
        return false;
    }
    ;


}


function random_str($length)
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $charLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $index = random_int(0, $charLength - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

// database function 
function connect_db()
{
    $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    return $db;

}
function select_all($val)
{
    $db = connect_db();

    $select = mysqli_query($db, "SELECT * FROM `$val`");
    return mysqli_fetch_all($select, MYSQLI_ASSOC);

}
function add_post($post_title, $post_desc, $post_image)
{
    $db = connect_db();

    $select = mysqli_query($db, "INSERT INTO `posts`(`ID`, `post_title`, `post_desc`, `post_image`) VALUES (NULL,'$post_title','$post_desc','$post_image')");

    return 'true';

}

function show_posts($limit = "")
{
    $db = connect_db();

    if ($limit == "") {

        $query = mysqli_query($db, "SELECT * FROM `posts`");
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    } else {
        $limit_val = intval($limit);
        $query = mysqli_query($db, "SELECT * FROM `posts` limit $limit_val ");
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }



}
function show_a_post($id)
{
    $db = connect_db();
    $id = strval($id);
    $query = mysqli_query($db, "SELECT * FROM `posts` WHERE md5(ID) ='$id' ;");
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}
function static_str()
{
    return "zc=hTat4>M9m8Cxjnp.SQkot9oW@GJ";
}

function check_uniq_user(string $username)
{
    $db = connect_db();

    $check_uniq = mysqli_query($db, "SELECT * FROM `users` WHERE `username` = '$username' ");
    return mysqli_fetch_row($check_uniq);


}

function add_user(string $username, string $password)
{
    $db = connect_db();

    $password = md5($password) . static_str();
    $user = check_uniq_user("$username");
    
    
    if ($user[1] == $username) {

        exit;
       

        // CHECK  THIS 
    } else {
        $select = mysqli_query($db, "INSERT INTO `users`(`ID`, `username`,`password`) VALUES (NULL,'$username','$password')");


        return "SUCCESS";

        exit;
    };



}

function get_user_id($username){
    $db = connect_db();

    $uid = mysqli_query($db, "SELECT * FROM `users` WHERE `username` = '$username' ");
    return mysqli_fetch_all($uid, MYSQLI_ASSOC);


}


