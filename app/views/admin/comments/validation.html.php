<div class="absolute p-3">
    <button class="w-10 h-10 rounded-full bg-gray-800" onclick="changeRoute('/admin')">
        <i class="mdi mdi-arrow-left"></i>
    </button>
</div>
<?php if (count($comments) > 0) : ?>
    <div class="flex-grow flex flex-col gap-3 items-stretch overflow-y-auto h-full p-5">
        <div>
            <div class="text-2xl -mb-1">Commentaires en attente (<?= count($comments) ?>)</div>
        </div>
        <hr />

        <?php foreach ($comments as $comment) : ?>
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/admin/comments/comment.html.php') ?>
        <?php endforeach; ?>
    </div>
<?php else : ?>
    <div class="flex-grow flex flex-col gap-3 items-center justify-center text-3xl">
        <i class="mdi mdi-close text-9xl"></i>
        <span class="text-center">Aucun commentaire en attente.</span>
    </div>
<?php endif; ?>