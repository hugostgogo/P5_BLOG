<?php if(isAdmin()): ?>
<div class="relative">
    <button class="hover:text-white text-gray-600 transition-all duration-200 w-8 h-8 rounded-full activatorButton" id="<?= $post->id ?>">
        <i class="mdi mdi-dots-vertical text-lg"></i>
    </button>
    <div class="absolute right-0 bg-gray-900 rounded p-2 flex flex-col items-stretch gap-2 hidden" id="menu<?= $post->id ?>">

        <button id="<?= $post->id ?>" class="updateButton rounded flex justify-between items-center gap-3 p-1 px-3 bg-gray-700 hover:bg-yellow-500 transition-all duration-500 ease-in-out">
            <span>Modifier</span>
            <i class="mdi mdi-pencil"></i>
        </button>

        <form action="article/delete" method="POST">
            <input type="hidden" name="id" value="<?= $post->id ?>">
            <button class="rounded flex justify-between items-center gap-3 p-1 px-3 bg-gray-700 hover:bg-red-500 transition-all duration-500 ease-in-out">
                <span>Supprimer</span>
                <i class="mdi mdi-delete"></i>
            </button>
        </form>

    </div>
</div>

<div id="form<?= $post->id ?>" style="display: none" class="absolute w-screen h-screen z-50 top-0 left-0 bg-black bg-opacity-40 flex items-center justify-center close-modal">
    <div class="
        relative

        w-full
        sm:w-5/6
        md:w-4/6
        lg:w-3/4

        rounded
        bg-gray-800
        p-3
    ">
        
        <?php $edit = true; include('app/Components/Forms/articleForm.html.php'); ?>
    </div>
</div>
<?php endif; ?>
