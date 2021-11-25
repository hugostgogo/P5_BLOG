<div class="bg-gray-800 shadow-2xl py-4 px-5 flex justify-between items-center z-20">

    <span data-z dta-z-layers="25" data-z-depth="5px" data-z-event="pointer" data-z-eventRotation="40deg" class="w-min text-gray-900 -my-3 cursor-pointer" style="font-size: 3em;" onclick="changeRoute('/')">
        H
    </span>


    <div class="flex gap-8 text-gray-500 text-lg">
        <div class="transition-all duration-300 ease-in-out hover:text-white cursor-pointer flex items-center gap-2" onclick="location.href = '/'">
            <i class="mdi mdi-home  text-4xl sm:text-xl"></i>
            <span class="hidden sm:block lg:block">Accueil</span>
        </div>
        <div class="transition-all duration-300 ease-in-out hover:text-white cursor-pointer flex items-center gap-2" onclick="location.href = '/articles'">
            <i class="mdi mdi-post text-4xl sm:text-xl"></i>
            <span class="hidden sm:block lg:block">Articles</span>
        </div>
        <div class="transition-all duration-300 ease-in-out hover:text-white cursor-pointer flex items-center gap-2" onclick="location.href = '/'">
            <i class="mdi mdi-email  text-4xl sm:text-xl"></i>
            <span class="hidden sm:block lg:block">Contact</span>
        </div>
    </div>

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/Components/Profile/barProfile.html.php'); ?>
</div>