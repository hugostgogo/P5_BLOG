<div class="flex flex-col justify-between rounded bg-gray-700 p-3" id="<?= $comment->id ?>">
    <div>
        <div class="flex items-center gap-2">
            <img src="<?= $comment->author->avatar ?>" class="rounded-full w-8">
            </img>
            <h3 class="font-bold text-xl"><?= $comment->author->nickname ?></h3>
        </div>
        <p class="py-2 text-gray-300 text-thin"><?= $comment->content ?></p>
    </div>
    
    
    <div class="flex items-center justify-between text-sm text-semibold">
        <h5><?= $comment->created_at ?></h5>
    </div>
</div>