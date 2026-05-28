<div class="flex justify-center items-center">
    <div
        class="my-4 mx-4 bg-blue-900/50 rounded-2xl w-[90vw] h-screen flex justify-center flex-wrap overflow-y-auto gap-7 py-4">
        <?php $posts = show_posts();
        foreach ($posts as $post):
            ?>
            <div class="group">
                <a href="/visit_post.php?id=<?php echo md5($post['ID']); ?>">
                <div class="group size-50 duration-700 ease-in-out  group-hover:mb-17  ">

                    <img src="<?php echo $post['post_image'] ?>" alt="NOT_FOUND"
                        class="outline-black outline-3 size-40 rounded-2xl duration-700 ease-in-out hover:size-50 hover:outline-2">
                    <h2 class="hidden duration-700 ease-in-out text-3xl group-hover:block size-10  pt-2 text-white">
                        <?php echo $post['post_title'] ?>
                    </h2>
                    <p class="hidden duration-700 ease-in-out group-hover:block size-40 pt-2 text-white">
                        <?php echo $post['post_desc'] ?>
                    </p>

                </div>
                </a>
            </div>

        <?php endforeach; ?>
    </div>
</div>