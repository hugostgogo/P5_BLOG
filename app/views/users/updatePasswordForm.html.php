<?php
$user = $result['user'];
?>

<div class="flex-grow flex flex-col justify-center items-center">
    <div class="w-1/2">
        <div class="self-start text-3xl pb-3">Modifier mon mot de passe</div>
        <div class="flex justify-center items-center gap-10 p-5 bg-gray-800 rounded w-full">

            <div class="flex items-center gap-3">
                <img src="<?= $user->avatar ?>" class="rounded-full w-32" />
                <div class="flex flex-col">
                    <div class="font-bold text-2xl"><?= $user->nickname ?></div>
                    <div class="font-thin text-lg"><?= $user->email ?></div>
                </div>
            </div>
            <form class="flex flex-col justify-center items-stretch gap-3 flex-grow" method="POST" action="/update/save/<?= $result['url']; ?>">
                <input type="password" name="password" class="p-3 rounded bg-gray-900" placeholder="Nouveau mot de passe">
                <input type="password" name="password2" class="p-3 rounded bg-gray-900" placeholder="Confirmation nouveau mot de passe">

                <button class="bg-gray-900 rounded p-3 gap-3 flex items-center justify-center">
                    Modifier
                    <i class="mdi mdi-pencil"></i>
                </button>
            </form>
        </div>
    </div>
</div>