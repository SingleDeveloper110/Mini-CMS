<div class="flex justify-center gap-6 my-5 mx-2 flex-wrap mb-20">
  <h2 class="text-white bg-black/40 rounded-3xl h-6 w-30 pl-4">Some Posts</h2>
  <div class="flex justify-center gap-6 mt-10 ">
  <?php $some_posts=show_posts("4") ;foreach ($some_posts as $some_post): ?>

    <div class="group ">
        <a href="/visit_post.php?id=<?php echo md5($some_post['ID']); ?>">
                <div class="group size-50 duration-700 ease-in-out  group-hover:mb-17  ">

                    <img src="<?php echo $some_post['post_image'] ?>" alt="NOT_FOUND"
                        class="outline-black outline-3 size-40 rounded-2xl duration-700 ease-in-out hover:size-50 hover:outline-2">
                    <h2 class="hidden duration-700 ease-in-out text-3xl group-hover:block size-10  pt-2 text-white">
                        <?php echo $some_post['post_title'] ?>
                    </h2>
                    <p class="hidden duration-700 ease-in-out group-hover:block size-40 pt-2 text-white">
                        <?php echo $some_post['post_desc'] ?>
                    </p>

                </div>
                </a>
            </div>

  <?php endforeach; ?>
</div>

</div>