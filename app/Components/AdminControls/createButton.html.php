<button class="p-2 rounded hover:bg-green-500 transition-all duration-500" id="createButton">
    <span class="2xl:contents xl:contens lg:contents hidden">Créer un <?= $model::label ?></span>
    <i class="mdi mdi-plus"></i>
</button>

<!-- CREATE MODAL -->
<div id="modal" class="absolute bg-black bg-opacity-60 h-screen w-screen top-0 left-0" style="display: none">
    <div class="w-full h-full flex justify-center items-center" id="modalBackgroundCreate">
        <div class="
            p-3 bg-gray-900
            rounded-lg

            xl:w-1/2
            md:w-3/4
            sm:w-4/5
            xs:w-5/6
            w-screen
            ">
            <?php include($_SERVER['DOCUMENT_ROOT'] . $model::form); ?>
        </div>
    </div>
</div>