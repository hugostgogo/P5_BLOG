<div class="flex-grow w-full flex justify-start items-center flex-col">

    <!-- HEADER -->
    <div class="w-full flex flex-col">
        <div class="flex justify-between items-center p-3 bg-gray-900 z-10">
            <div class="flex items-center gap-3">
                <button type="button" class="p-3 border-2 rounded-full w-8 h-8 flex justify-center items-center" onclick="changeRoute('/admin')">
                    <i class="mdi mdi-arrow-left"></i>
                </button>
                <h1 class="text-2xl"><?= $model::label ?>s</h1>
            </div>

            <?php if (isAdmin()) : ?>

                <div class="flex gap-x-2">
                    <?php include('app/Components/AdminControls/createButton.html.php') ?>
                </div>

            <?php endif; ?>
        </div>
    </div>

    <!-- WRAPPER -->
    <?php if (count($items)) : ?>
        <div class="
            w-full
            flex-grow
            pb-5
            grid

            2xl:grid-cols-3
            xl:grid-cols-3
            lg:grid-cols-3
            md:grid-cols-2

            grid-cols-1

            2xl:grid-rows-3
            xl:grid-rows-3
            lg:grid-rows-3
            md:grid-rows-5

            grid-rows-9

            px-5
            gap-3
        " id="cardsWrapper">

            <?php foreach ($items as $item) : ?>
                <?php include($_SERVER['DOCUMENT_ROOT'] . $model::card); ?>
            <?php endforeach; ?>
        </div>


        <!-- WRAPPER FOOTER -->
        <?php if ($pages > 1) : ?>
            <div class="grid grid-rows-1 grid-flow-col gap-2 py-5">
                <button class="p-2 rounded bg-gray-500 transition-all duration-500 h-8 w-8 flex justify-center items-center self-center" onclick="changeRoute('/articles?page=<?= $currentPage == 1 ? $currentPage : $currentPage - 1 ?>')">
                    <i class="mdi mdi-arrow-left"></i>
                </button>

                <div class="grid grid-rows-1 grid-flow-col">
                    <?php for ($i = 1; $i <= $pages; $i++) : ?>
                        <button class="<?= $i == $currentPage ? "bg-gray-600" : "" ?> p-2 rounded h-10 w-8 flex justify-center items-center" onclick="changeRoute('/articles?page=<?= $i ?>')">
                            <span><?= $i ?></span>
                            <button>
                            <?php endfor; ?>
                </div>

                <button class="p-2 rounded bg-gray-500 transition-all duration-500 h-8 w-8 flex justify-center items-center self-center" onclick="changeRoute('/articles?page=<?= $currentPage == $pages ? $currentPage : $currentPage + 1  ?>')">
                    <i class="mdi mdi-arrow-right"></i>
                </button>
            </div>
        <?php endif; ?>
    <?php else : ?>
        <div class="
                flex-grow
                w-full

                flex
                flex-col
                justify-center
                items-center

                pb-48
            ">
            <i class="mdi mdi-close -mb-24" style="font-size: 20em;"></i>
            <div class="text-xl flex flex-col justify-center items-center">
                <div class="text-gray-white">Aïe !</div>
                <div class="text-gray-400">Il n'y a pas d'article sur cette page..</div>
            </div>
        </div>
    <?php endif; ?>
    <!-- ENDWRAPPER -->




</div>

