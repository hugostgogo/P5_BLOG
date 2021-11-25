<?php
use App\Models\User;

$fields = array(
    array( "label" => "Pseudo / E-mail", "type" => "text", "name" => "name"),
    array( "label" => "Mot de passe", "type" => "password", "name" => "password"),
);

if (User::isLogged()) {
    redirect('/');
}

?>
<div class="flex-grow flex items-center justify-center">
    <div class="bg-gray-800 p-3 flex flex-col rounded" style="min-width: 80%;">
        <form method="POST" action="<?= site_url() . "login" ?>" class="flex flex-col gap-4">
            <h1 class="text-3xl text-white">Se connecter</h1>
            <div class="flex flex-col gap-3">
                <?php foreach ($fields as $key => $field): ?>
                        <input value="<?= isset($form[$field['name']]) ? $form[$field['name']] : ''?>" placeholder="<?php echo $field['label'] ?>" type="<?php echo $field['type'] ?>" name="<?php echo $field['name'] ?>" class="p-3 rounded text-black">
                        </input>
                        <?php if (isset($errors[$field['name']])): ?>
                            <span class="text-red-500"><?= $errors[$field['name']] ?></span>
                        <?php endif; ?>
                        
                <?php endforeach; ?>
                <p>Pas de compte ? <a href="/register">Créez-en un</a></p>
            </div>
            <input type="submit" class="p-3 px-5 rounded bg-red-500 text-white self-end cursor:pointer" value="Se connecter"></input>
        </form>
    </div>
</div>