<?php
require_once("./config.php");
$posts = show_posts(3);
?>
<div class="flex items-center h-6 w-30 rounded-3xl mt-10  ml-48 bg-black/40 ">
    <h2 class="text-white pl-3 ">Top of things</h2>

</div>
<div class="p-10 flex justify-around flex-row">

    <div class="bg-blue-800 w-80 h-40 text-white rounded-lg ">
        <div class="p-4">

            <h4>Posts List</h4>

            <div class="h-25 overflow-y-auto">


                <?php foreach ($posts as $post): ?>
                    <p class="py-1">
                        <a href="/visit_post.php?id=<?php echo md5($post['ID']); ?>"> <?php echo $post["post_title"]; ?> </a>
                    </p>
                <?php endforeach; ?>



            </div>

        </div>
    </div>







</div>