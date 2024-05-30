<div class="w-full h-16 bg-yellow-300/50 flex flex-row items-center justify-between px-14">
    <ul class="flex flex-row items-center justify-center gap-4 h-full">
        <?php
        foreach ($tabs as $url => $name) {
        ?>
            <li class="h-full grid items-center <?= $currentTab === $url ? "border-b-4 border-b-black" : "" ?>">
                <a href="<?= $url ?>" class="flex flex-row items-center justify-center font-medium hover:text-black transition-colors duration-300  <?= $currentTab === $url ? "text-black" : "text-gray-600" ?>">
                    <?= $name ?>
                    <span class="ml-2 bg-white h-8 min-w-8 text-center grid items-center rounded-md border border-gray-200">0</span>
                </a>
            </li>
        <?php }; ?>
    </ul>
    <div class="relative">
        <input type="text" class="w-full h-10 px-4 py-2 text-sm text-gray-600 placeholder-gray-400 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-400" placeholder="Tìm kiếm">
    </div>
</div>