<div class="flex-grow flex flex-col items-stretch justify-around">
    <div class="font-bold text-5xl text-center">Voulez vous vraiment supprimer votre compte ?</div>

    <div class="flex items-center justify-center gap-5 p-8 bg-gray-800 rounded-lg">
        <img src="<?= $user->avatar ?>" class="w-36 rounded-full">
        <div class="w-96">
            <div class="text-3xl"><?= $user->nickname ?></div>
            <div class="text-xl"><?= $user->email ?></div>
            <div class="text-sm">Inscris le <?= $user->created_at ?></div>
        </div>
    </div>
    <div class="flex justify-center text-xl gap-5">
        <button class="bg-gray-700 p-3 px-36 rounded" onclick="location.href = '/profile'">Annuler</button>
        <form method="POST" action="/confirm/delete/<?= $user->id ?>">
            <button type="submit" class="bg-red-500 p-3 px-36 rounded flex items-center justify-center">
                <div>Supprimer</div>
            </button>
        </form>
    </div>
</div>