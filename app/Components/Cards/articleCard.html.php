<?php
$post = $item;
$longtext = $post->content;

$likedClass = 'text-yellow-500';
?>

<div class="flex flex-col justify-between rounded bg-gray-800 p-3 item cursor-pointer" onclick="location.href= '/article/<?= $post->id ?>'">
    <div>
        <div class="flex justify-between items-center">
            <h3 class="font-bold text-xl"><?= $post->title ?></h3>
            <?php include('app/Components/AdminControls/cardMenu.html.php') ?>
        </div>
        <p class="py-2 text-gray-300 text-thin">
            <?= truncateText($post->content, 250) ?>
        </p>
    </div>



    <div class="flex items-center justify-between text-sm text-semibold">
        <div class="flex items-center gap-1">
            <div class="flex items-center">
                <button class="h-8 w-6 flex items-center justify-center rounded-full">
                    <i class="mdi mdi-star text-xl shadow-xl"></i>
                </button>
                <span><?= $post->likesCount ?></span>
            </div>
            <div class="flex items-center">
                <button class="h-8 w-6 flex items-center justify-center rounded-full">
                    <i class="mdi mdi-comment text-xl shadow-xl"></i>
                </button>
                <span><?= $post->commentsCount ?></span>
            </div>
        </div>
        <div class="flex flex-col items-end">
            <span>Modifié <?= $post->formatedUpdated ?></span>
            <span>Publié <?= $post->formatedCreated ?></span>
        </div>
    </div>

    <div id="updateModal" class="absolute bg-black bg-opacity-60 h-screen w-screen top-0 left-0" style="display: none">
        <div class="w-full h-full flex justify-center items-center" id="modalBackgroundUpdate">
            <div class="
            p-3 bg-gray-900
            rounded-lg

            xl:w-1/2
            md:w-3/4
            sm:w-4/5
            xs:w-5/6
            w-screen
            ">
                <?php include($_SERVER['DOCUMENT_ROOT'] . $model::form); ?>
            </div>
        </div>
    </div>

    
</div>