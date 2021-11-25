<div class="flex-grow flex justify-center p-5">
    <div class="border-2 rounded p-5 w-1/2 flex flex-col justify-between items-center">
        <div>
            <div class="text-xl font-bold">Profil</div>
            <hr class="my-2" />
        </div>

        <div class="flex flex-col gap-2 items-center justify-center">
            <img class="rounded-full border-4 w-60" src="<?= $user->avatar ? $user->avatar : 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png' ?>" />

            <form method="POST" action="/update/user/<?= $user->id ?>" class="flex flex-col align-stretch">
            <div class="flex items-center justify-center gap-3 p-3">

                <input class="bg-gray-800 p-2 rounded flex-grow" placeholder="<?= $user->avatar ?>" value="<?= isset($post['avatar']) && trim($post['avatar']) !== "" ? $post['avatar'] : null ?>" name="avatar">

                <button type="submit" class="flex gap-2 justify-center items-center w-36 rounded bg-gray-700 hover:bg-yellow-500 py-1 cursor-pointer transition-all duration-250 ease-in-out"> Modifier <i class="mdi mdi-pencil text-xl"></i>
                </button>
            </div>
            </form>
        </div>

        <div class="text-lg leading-none flex flex-col align-stretch h-1/2 w-4/5">

            <form method="POST" action="/update/user/<?= $user->id ?>" class="flex flex-col align-stretch">
                <div class="flex items-center justify-center gap-3 p-3">
                    <div>Pseudo :</div>

                    <input class="bg-gray-800 p-2 rounded flex-grow" placeholder="<?= $user->nickname ?>" value="<?= isset($post['nickname']) && trim($post['nickname']) !== "" ? $post['nickname'] : null ?>" name="nickname">

                    <button type="submit" class="flex gap-2 justify-center items-center w-36 rounded bg-gray-700 hover:bg-yellow-500 py-1 cursor-pointer transition-all duration-250 ease-in-out"> Modifier <i class="mdi mdi-pencil text-xl"></i>
                    </button>
                </div>

                <div class="flex items-center justify-center gap-3 p-3">
                    <div>E-mail :</div>
                    <input class="bg-gray-800 p-2 rounded flex-grow" placeholder="<?= $user->email ?>" value="<?= isset($post['email']) && trim($post['email']) !== "" ? $post['email'] : null ?>" name="email">
                    <button type="submit" class="flex gap-2 justify-center items-center w-36 rounded bg-gray-700 hover:bg-yellow-500 py-1 cursor-pointer transition-all duration-250 ease-in-out">
                        Modifier
                        <i class="mdi mdi-pencil text-xl"></i>
                    </button>

                </div>
            </form>

            <form method="POST" action="/update/user/password/<?= $user->id ?>">
                <div class="flex items-center justify-center gap-3 p-3">
                    <div class="flex-grow">Mot de passe</div>
                    <button type="submit" class="flex gap-2 justify-center items-center w-36 rounded bg-gray-700 hover:bg-yellow-500 py-1 cursor-pointer transition-all duration-250 ease-in-out">
                        Modifier
                        <i class="mdi mdi-pencil text-xl"></i>
                    </button>
                </div>
            </form>

            <form action="/delete/user">
                <div class="flex items-center justify-center gap-3 p-3">
                    <div class="flex-grow">Supprimer le compte</div>
                    <button type="submit" class="flex gap-2 justify-center items-center w-36 rounded bg-gray-700 hover:bg-red-500 py-1 cursor-pointer transition-all duration-250 ease-in-out">
                        Supprimer
                        <i class="mdi mdi-delete text-xl"></i>
                    </button>
                </div>
            </form>

            <form>
                <div class="p-3">
                    Inscrit depuis
                    <?= $user->created_at ?>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    form {
        display: flex;
        flex-direction: column;
    }
</style>