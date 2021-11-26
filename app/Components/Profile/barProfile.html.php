<?php

use App\Models\User;

$isLogged = User::isLogged();
$user = User::getLogged();
?>

<div class="flex items-stretch gap-3">
    <?php if ($isLogged) : ?>
        <div class="relative">
            <img src="<?= $user->avatar ? $user->avatar : 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png' ?>" class="rounded-full h-12 w-12 cursor-pointer" id="profilePictureButton" />
            <div class="absolute right-0 flex flex-col bg-gray-700 p-2 rounded gap-2 top-full mt-2 right-0 shadow-lg w-72 hidden z-50" id="profileMenu">
                <?php if($user->role == 1): ?>
                <button class="p-1 bg-gray-800 rounded flex items-center justify-between w-full px-3 hover:bg-black transition-all duration-500 ease-in-out" onclick="changeRoute('/admin')">
                    Administration
                    <i class="mdi mdi-account-cowboy-hat text-2xl"></i>
                </button>
                <?php endif; ?>

                <button class="p-1 bg-gray-800 rounded flex items-center justify-between w-full px-3 hover:bg-blue-500 transition-all duration-500 ease-in-out" onclick="changeRoute('/profile')">
                    Profil
                    <i class="mdi mdi-account text-2xl"></i>
                </button>

                <button class="p-1 bg-gray-800 rounded flex items-center justify-between w-full px-3 hover:bg-yellow-400 transition-all duration-500 ease-in-out" onclick="changeRoute('/articles?liked=true')">
                    Articles favoris
                    <i class="mdi mdi-star text-2xl"></i>
                </button>

                <button class="p-1 bg-gray-800 rounded flex items-center justify-between w-full px-3 hover:bg-red-500 transition-all duration-500 ease-in-out" onclick="changeRoute('/logout')">
                    Déconnexion
                    <i class="mdi mdi-logout text-2xl"></i>
                </button>
            </div>
        </div>

        <div class="hidden sm:block flex flex-col jsutify-center">
            <h1><?= $user->nickname ?></h1>
            <h2 class="text-xs text-gray-500"><?= $user->email ?></h2>
        </div>
    <?php elseif ($_SERVER['REQUEST_URI'] != '/login') : ?>
        <button class="p-1 bg-gray-900 rounded flex items-center justify-center w-36 h-10" onclick="changeRoute('/login')">
            Se connecter
        </button>
    <?php endif; ?>
</div>