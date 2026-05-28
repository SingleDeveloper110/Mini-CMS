<?php
require_once("config.php");
$res = show_a_post($_GET["id"]);

?>
<link href="/assets/css/output.css" rel="stylesheet">

<div class="w-full h-screen bg-blue-900 flex justify-center items-center flex-col ">
    <?php foreach($res as $r): ?>
<div class="size-90 -mt-10 ">
        <img src="<?php echo $r['post_image']; ?>" alt="" class="rounded-2xl">
    </div>
    
    <div class="w-50 h-6 -mt-10 bg-blue-500 flex justify-center items-center rounded-2xl text-white">
        <h2><?php echo $r['post_title']; ?></h2>
    </div>
    <div class="w-50 h-30 mt-4 bg-blue-500 flex justify-center items-center rounded-2xl text-white">
        <p><?php echo $r['post_desc']; ?></p>
    
    </div>
    <?php endforeach; ?>
</div>