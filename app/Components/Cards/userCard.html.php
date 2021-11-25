<?php
$user = $item
?>

<div class="flex items-center justify-around rounded bg-gray-800 p-3" id="<?= $user->id ?>">
    <img src="<?= $user->avatar ?>" class="w-36 h-36 rounded-full" />
    <div class="flex flex-col justify-between items-start">
        <h3 class="font-bold text-xl"><?= $user->nickname ?></h3>
        <p class="py-2 text-gray-300 text-thin"><?= $user->email ?></p>
        <h5 class="text-sm text-semibold">Inscris depuis <?= $user->formatedCreated ?></h5>
    </div>
</div>