<?php
$user = $result['user'];
?>
<div class="flex-grow flex flex-col justify-center items-center gap-3">
    <i class="mdi mdi-mail text-9xl animate-bounce" style="font-size: 18em;"></i>
    <strong class="text-3xl"><?= $user->email ?></strong>
    <div class="text-2xl font-thin">Un mail de changement de mot de passe vous a été envoyé </div>
    <form class="relative flex flex-col" method="post">
        <input class="p-3 rounded bg-gray-800 w-96" placeholder="XXX XXX XXX" name="code" inputmode="numeric" minlength="9"
       maxlength="9" size="8" required></input>
        <div class="absolute top-0 right-0 h-full pr-3 flex items-center">
            <button type="submit" class="bg-gray-700 p-1 rounded px-3 hover:bg-gray-500 hover:text-gray-900 transition-all duration-500 ease-in-out">
                <i class="mdi mdi-check"></i>
            </button>
        </div>
    </form>

    <?php if (isset($result['errors'])) : ?>
        <?php if ($result['errors']['code']): ?>
            <span class="text-sm text-red-500 -mt-2"><?= $result['errors']['code'] ?></span>
        <?php endif;?>
    <?php else : ?>
        <span class="text-sm text-gray-600 -mt-2">Code reçu par mail</span>
    <?php endif; ?>

    <button class="bg-gray-700 p-1 rounded px-5 py-2 hover:bg-gray-500 hover:text-gray-900 transition-all duration-500 ease-in-out" onclick="location.href='/profile'">
        Annuler
    </button>
</div>
