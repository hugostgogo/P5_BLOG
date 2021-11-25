<?php
    $edit = isset($edit);
    $actionUrl = $edit ? '/article/update' : '/articles';
?>

<div class="flex flex-col">
    <div class="flex items-center justify-between text-2xl">
        <h1><?= $edit ? "Modifier l'article $post->id | $post->content" : "Nouvel Article"; ?></h1>
        <i class="mdi mdi-post"></i>
    </div>
    <form class="flex flex-col py-2 gap-y-2 overflow-auto" id="form" action="<?= $actionUrl ?>" method="POST">
        <hr class="bg-red-500" />
        <?php if($edit): ?><input type="hidden" name="id" value="<?= $post->id ?>"></input><?php endif; ?>
        <input class="p-2 bg-gray-700 rounded" type="text" placeholder="Titre" name="title" value="<?= isset($post->title) ? $post->title : ''; ?>"></input>
        <input class="p-2 bg-gray-700 rounded" type="text" placeholder="Chapô" name="chapo" value="<?= isset($post->chapo) ? $post->chapo : ''; ?>"></input>
        <textarea class="p-2 bg-gray-700 rounded h-48" type="text" placeholder="Contenu" name="content"><?= isset($post->content) ? $post->content : ''; ?></textarea>

        <button class="p-2 px-5 hover:bg-gray-700 text-white text-bold rounded flex items-center justify-center self-end gap-x-2 transition-all duration-500 ease-in-out" type="submit">
            <span class="mb-1 text-lg"><?= $edit ? "Enregistrer" : "Créer"; ?></span>
            <i class="mdi mdi-arrow-right text-2xl"></i>
        </button>
    </form>
</div>
