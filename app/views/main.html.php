<?php
$socialLinks = [
    array(
        "label" => "CV",
        "labelAccount" => "",
        "link" => config('links.cv'),
        "icon" => "file-account",
        "document" => array(),
    ),
    array(
        "label" => "Github",
        "labelAccount" => "hugostgogo",
        "link" => config('links.github'),
        "img" => "https://cdn-icons-png.flaticon.com/512/25/25231.png"
    ),
    array(
        "label" => "LinkedIn",
        "labelAccount" => "Hugo Le Moal",
        "link" => config('links.linkedin'),
        "img" => "https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/LinkedIn_logo_initials.png/600px-LinkedIn_logo_initials.png"
    ),
]
?>


<div id="page" class="flex-grow w-full grid grid-rows-2 gap-5 z-10">
    <div class="flex flex-col sm:flex-row items-center justify-center gap-5 px-10 sm:px-20 md:px-50 lg:px-70">
        <div class="flex items-center justify-center">
            <span data-z dta-z-layers="25" data-z-depth="50px" data-z-event="pointer" data-z-eventRotation="60deg" class="w-min text-gray-900 -my-3 cursor-pointer" style="font-size: 15em;" onclick="changeRoute('/')">
                H
            </span>
        </div>
        <div class="flex flex-col justify-center items-center gap-3 text-center sm:text-left">
            <h1 class="font-bold text-6xl"><?= config('blog.author') ?></h1>
            <p class="font-thin text-xl"><?= config('blog.authorbio') ?></p>
        </div>
    </div>
    <div class="flex flex-col gap-3 px-10">
        <h1 class="text-3xl">Me retrouver</h1>
        <hr />
        <div class="flex flex-col items-stretch gap-3 sm:flex-row">

            <div class="grid grid-cols-1 gap-3 sm:w-1/3">

                <?php foreach ($socialLinks as $link) : ?>
                    <div class="flex justify-between items-center p-3 bg-gray-800 rounded">
                        <div class="flex justify-center items-center gap-3">
                            <?php if (isset($link['img'])) : ?>
                                <img class="w-14" src="<?= $link['img'] ?>">
                            <?php endif ?>
                            <?php if (isset($link['icon'])) : ?>
                                <div class="w-14">
                                    <i class="mdi mdi-<?= $link['icon'] ?> text-6xl"></i>
                                </div>
                            <?php endif ?>
                            <div class="flex flex-col justify-center">
                                <span class=""><?= $link['label'] ?></span>
                                <span class="text-gray-500 text-sm"><?= $link['labelAccount'] ?></span>
                            </div>
                        </div>
                        <div class="flex gap-1">
                            <?php if (isset($link['icon'])) : ?>
                                <a href="<?= $link['link'] ?>" download>
                                    <button class="w-12 h-12 bg-gray-900 rounded-full shadow">
                                        <i class="mdi mdi-download text-xl"></i>
                                    </button>
                                </a>
                            <?php endif; ?>
                            <button class="w-12 h-12 bg-gray-900 rounded-full shadow" onclick="window.open('<?= $link['link'] ?>', '_blank')">
                                <i class="mdi mdi-open-in-new text-xl"></i>
                            </button>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if (!(isset($_GET['success']) && isset($_GET['type']) && $_GET['success'] == 1 && $_GET['type'] == 'email')) : ?>

                <form class="flex-grow bg-gray-800 p-3 rounded flex flex-col gap-3" method="POST" action="/contact/email">
                    <h1 class="text-xl">Contact</h1>
                    <div class="flex flex-col gap-2 flex-grow">
                        <input name="name" placeholder="Nom, Prénom" class="bg-gray-900 rounded p-3"></input>
                        <input type="email" name="email" placeholder="E-mail" class="bg-gray-900 rounded p-3"></input>
                        <textarea type="text" name="message" placeholder="Votre message..." class="bg-gray-900 rounded p-3 flex-grow h-24"></textarea>
                    </div>
                    <button type="submit" class="p-2 bg-gray-900 rounded flex gap-2 items-center justify-center">
                        Envoyer
                        <i class="mdi mdi-send"></i>
                    </button>
                </form>
            <?php else : ?>

                <div class="flex-grow rounded bg-gray-800 flex flex-col items-center justify-center gap-3">
                    <i class="mdi mdi-mail -my-12" style="font-size: 8em;"></i>
                    <span class="text-xl">Votre message a bien été envoyé !</span>
                </div>

            <?php endif; ?>
        </div>
    </div>
</div>