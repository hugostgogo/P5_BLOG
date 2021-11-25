<div class="flex-grow p-3 flex flex-col">
    <div class="bg-gray-700 p-2 rounded">
        <h1><?= $post->title ?></h1>
        <p class="italic">
            <?= $post->chapo ?>
        </p>
        <p>
            <?= $post->content ?>
        </p>

        <div class="flex items-center gap-2 p-2 text-lg">

            <div class="flex-grow">
                <span><?= $post->formatedCreated ?></span>
            </div>

            <form action="/articles/like" method="POST">
                <span><?= $post->likesCount ?></span>
                <input type="hidden" name="post_id" value="<?= $post->id ?>">
                <button type="submit">
                    <i class="mdi mdi-thumb-up text-2xl"></i>
                </button>
            </form>
        </div>
    </div>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/Components/Comments.php') ?>
</div>