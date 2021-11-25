<div class="flex flex-col">
    <div class="flex items-center justify-between text-2xl">
        <h1>Nouvel Utilisateur</h1>
        <i class="mdi mdi-account"></i>
    </div>
    
    <form class="flex flex-col py-2 gap-y-2 overflow-auto" method="POST" id="createUser">
        <hr class="bg-red-500" />
        <input class="p-2 bg-gray-700 rounded" type="text" placeholder="Pseudo" name="nickname" required>
        <input class="p-2 bg-gray-700 rounded" type="email" placeholder="Email" name="email" required>
        <input class="p-2 bg-gray-700 rounded" type="password" placeholder="Mot de passe" name="password" required>
        <input class="p-2 bg-gray-700 rounded" type="password" placeholder="Confirmation mot de passe" name="password1" required>
    </form>

    <button id="submitBtn" class="p-2 px-5 hover:bg-gray-700 text-white text-bold rounded flex items-center justify-center self-end gap-x-2 transition-all duration-500 ease-in-out">
        <span class="mb-1 text-lg">Créer</span>
        <i class="mdi mdi-arrow-right text-2xl"></i>
    </button>
</div>