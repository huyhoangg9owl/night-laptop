<form action="" method="POST" class="w-full h-full">
    <div>
        <h1 class="text-2xl mb-6">Cài đặt</h1>
        <?php
        global $conn;
        $query = "SELECT * FROM seo_setting ORDER BY created_at DESC";
        $seo_setting = $conn->query($query);
        $seo_setting = $conn->fetch_once();
        ?>
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2" for="seo_title">
                    Tiêu đề
                </label>
                <input required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       name="seo_title" id="seo_title" type="text" value="<?= $seo_setting['title'] ?>">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2" for="seo_author">
                    Tác giả
                </label>
                <input required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       name="seo_author" id="seo_author" type="text" value="<?= $seo_setting['author'] ?>">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2" for="seo_description">
                    Mô tả
                </label>
                <textarea required
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                          name="seo_description" id="seo_description"><?= $seo_setting['description'] ?></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2" for="seo_keywords">
                    Từ khóa
                </label>
                <textarea required
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                          name="seo_keywords" id="seo_keywords"><?= $seo_setting['keywords'] ?></textarea>
            </div>
        </div>
    </div>
    <div class="mt-8">
        <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2"
        >
            Lưu thay đổi
        </button>
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="reset">
            Hủy
        </button>
    </div>
</form>