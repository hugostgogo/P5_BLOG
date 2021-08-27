<?php 
    $fields = array(
        array( "label" => "Pseudo / E-mail", "type" => "text", "name" => "name"),
        array( "label" => "Mot de passe", "type" => "password", "name" => "password"),
    )
?>
<div class="w-screen h-screen flex items-center justify-center">
    <div class="bg-gray-800 p-3 flex flex-col" style="min-width: 80%;">
        <form method="POST">
            <h1 class="text-3xl text-white mb-3">Se connecter</h1>
            <div class="flex flex-col w-50">
                <?php foreach ($fields as $key => $field): ?>
                        <input placeholder="<?php echo $field['label'] ?>" type="<?php echo $field['type'] ?>" name="<?php echo $field['name'] ?>" class="mb-2 p-3 rounded">
                        </input>
                <?php endforeach; ?>
            </div>
            <input type="submit" class="p-3 rounded bg-red-500 text-white align-self-end" value="Se connecter"></input>
        </form>
    </div>
</div>

<script>

</script>