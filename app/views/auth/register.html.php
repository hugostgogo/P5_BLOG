<?php
$fields = array(
    array("label" => "Pseudo", "type" => "text", "name" => "nickname"),
    array("label" => "E-mail", "type" => "email", "name" => "email"),
    array("label" => "Mot de passe", "type" => "password", "name" => "password"),
    array("label" => "Confirmation mot de passe", "type" => "password", "name" => "password1"),
);
?>

<div class="flex-grow flex items-center justify-center">
    <div class="bg-gray-800 p-3 flex flex-col" style="min-width: 80%;">
        <form method="POST">
            <h1 class="text-3xl text-white mb-3">Inscription au blog</h1>
            <div class="flex flex-col items-stretch w-50 text-black">
                <?php foreach ($fields as $key => $field) : ?>
                    <div class="py-1 flex flex-col">
                        <input placeholder="<?php echo $field['label'] ?>" type="<?php echo $field['type'] ?>" name="<?php echo $field['name'] ?>" class="p-3 rounded">
                        </input>
                        <?php if (isset($errors[$field['name']])) : ?><span class="text-red-500 text-sm pl-1 pt-1"><?= $errors[$field['name']] ?></span><?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <p>Déja un compte ? <a href="/login">Se connecter</a></p>
            <input type="submit" class="p-3 rounded bg-red-500 text-white align-self-end" value="S'inscrire"></input>
        </form>
    </div>
</div>