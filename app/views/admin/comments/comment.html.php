<div class="flex flex-col bg-gray-700 p-5 rounded">
    <div class="flex items-center gap-2">
        <div class="flex flex-col flex-grow gap-3">
            <div class="flex items-center gap-2">
                <img src="<?= $comment->author->avatar ?>" class="w-12 h-12 rounded-full">
                <div class="flex flex-col items-start justify-center">
                    <div><?= $comment->author->nickname ?></div>
                    <div class="text-xs"><?= $comment->author->email ?></div>
                </div>
            </div>
            <div class="pl-2 py-1 text-sm border-l-4 flex flex-col justify-center items-start">
                <div class="pb-2"><?= $comment->content ?></div>
                <div class="bg-gray-800 p-2 rounded grid grid-cols-3 px-4 items-center">
                    <div><?= $comment->post->title ?></div>
                    <div></div>
                    <div class="flex items-cenetr justify-end">
                        <i class="mdi mdi-link text-3xl"></i>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-start gap-1 italic">
                <i class="mdi mdi-calendar text-xl"></i>
                <div class="text-sm"><?= $comment->formatedCreated ?></div>
            </div>
        </div>
        <div class="flex items-center justify-end gap-2">
            <form action="/admin/comments/validation/<?= $comment->id ?>" method="POST">
                <input type="hidden" name="state" value="1">
                <button class="w-12 h-12 bg-gray-800 rounded-full cursor-pointer flex items-center justify-center hover:bg-green-500 transition-all duration-250 ease-in-out" type="submit">
                    <i class="mdi mdi-check"></i>
                </button>
            </form>
            <form action="/admin/comments/validation/<?= $comment->id ?>" method="POST">
                <input type="hidden" name="state" value="0">
                <button class="w-12 h-12 bg-gray-800 rounded-full cursor-pointer flex items-center justify-center hover:bg-red-500 transition-all duration-250 ease-in-out" type="submit">
                    <i class="mdi mdi-close"></i>
                </button>
            </form>
        </div>
    </div>
</div>