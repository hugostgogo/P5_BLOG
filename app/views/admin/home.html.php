<?php
$pages = [
    [
        "url" => "admin/comments/validation",
        "label" => "Commentaires en attente de validation ($commentsCount)",
        "icon" => "comment-multiple",
    ],
    [
        "url" => "admin/users",
        "label" => "Utilisateurs",
        "icon" => "account-multiple",
    ],
]
?>
<div class="flex-grow flex flex-col p-3">
    <div class="flex justify-between items-center">
        <div class="flex items-center gap-3">
            <button class="rounded-full w-10 h-10 border-2 flex items-center justify-center" onclick="changeRoute('/')">
                <i class="mdi mdi-home text-2xl"></i>
            </button>
            <h1 class="text-white text-3xl">
                <?= config('blog.title') ?>
            </h1>
        </div>
    </div>
    <div class="
        flex-grow
        grid

        grid-rows-2
        grid-cols-1

        gap-5 
        p-3
    ">
        <?php foreach ($pages as $page) : ?>
            <div class="transition-all hover:text-white duration-300 ease-in-out transform bg-gray-800 text-gray-500 rounded flex flex-col justify-center items-center text-center text-xl cursor-pointer" onclick="changeRoute('<?= $page['url'] ?>')">
                <i class="text-9xl mdi mdi-<?= $page['icon'] ?>"></i>
                <h1><?= $page['label'] ?></h1>
            </div>
        <?php endforeach; ?>
    </div>

</div>