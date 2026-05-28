<?php
$status = false;
if (isset($_POST['btn_create']) && $_POST['btn_create'] == "yes" && $_GET['create_post'] == "true") {
    save_data(
        $_FILES["image"]["tmp_name"],
        end(explode("/", $_FILES["image"]["type"])),
        random_str(5) . "." . $ext,
        "./assets/uploads/" . date("Y-m-d"),
        $_POST['post_title'],
        $_POST['post_desc']
    );
    $status = true;
}
if ($status) {
    header("Location:" . "dashboard.php");
}


// $filename = $_FILES["image"]["tmp_name"];

// $ext = end(explode("/", $_FILES["image"]["type"]));

// $nametosave = random_str(5) . "." . $ext;

// if (!file_exists("./assets/uploads/" . date("Y-m-d"))) {
//     mkdir("./assets/uploads/" . date("Y-m-d"));
// }

// $path = "./assets/uploads/" . date("Y-m-d");

// move_uploaded_file(
//     $filename,
//     strval($path . "/") . $nametosave
// );
?>
<link href="./assets/css/output.css" rel="stylesheet">

<div class="w-full h-screen bg-blue-700/40 flex justify-center items-center">



    <form action="?create_post=true" method="post" enctype="multipart/form-data"
        class=" bg-blue-700/80 rounded-lg text-white ">
        <label for="" class="ml-3">Post Title :</label>
        <input type="text" class="my-2 px-2 bg-black/50 text-white rounded-lg" name="post_title">
        <br>
        <label for="" class="ml-3">Post descrition :</label>
        <input type="text" class="my-2 px-2 bg-black/50 text-white rounded-lg" name="post_desc">
        <br>
        <label for="" class="ml-3">Upload Image : </label>
        <input type="file" name="image" id="" class="my-2 px-2 bg-black/50 text-white rounded-lg">
        <br>
        <button name="btn_create" value="yes" class="my-2 ml-45 bg-black/50 px-3 rounded-lg ">CLICK</button>
    </form>


</div>