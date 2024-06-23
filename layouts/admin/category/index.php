<form action="/services/admin/category/toggle_status" method="get">
    <h1 class="font-normal text-3xl text-gray-600 be-vietnam-pro-black">Danh mục</h1>
    <div class="flex flex-row items-center justify-center w-fit gap-4">
        <a href="/admin/category/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-4 flex flex-row items-center justify-center w-fit">
            <?php
            Icon('plus', 'w-5 h-5 inline-block mr-2');
            ?>
            Thêm mới
        </a>
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded my-4 flex flex-row items-center justify-center w-fit">
            <?php
            Icon('update', 'w-5 h-5 inline-block mr-2');
            ?>
            Cập nhật
        </button>
    </div>
    <table class="w-full mt-4 table-fixed">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2 w-20">ID</th>
                <th class="border border-gray-300 px-4 py-2">Tên</th>
                <th class="border border-gray-300 px-4 py-2">Slug</th>
                <th class="border border-gray-300 px-4 py-2">Trạng thái</th>
                <th class="border border-gray-300 px-4 py-2">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($categories)) {
                $id = 1;
                foreach ($categories as $category) {
            ?>
                    <tr class="w-full">
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <p class="line-clamp-1"><?= $id ?></p>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <p class="line-clamp-1"><?= $category['name'] ?></p>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <p class="line-clamp-1"><?= $category['slug'] ?></p>
                        </td>
                        <td class="border-b border-gray-300 px-4 py-2 flex flex-row gap-4 items-center justify-center relative">
                            <label class="relative inline-flex cursor-pointer items-center order-2 peer/switch-toggle">
                                <input name="id[]" value="<?= $category['id'] ?>" <?= $category['status'] ? "checked" : "" ?> type="checkbox" class="sr-only peer" />
                                <div class="h-4 w-11 rounded border bg-slate-300 after:absolute after:-top-1 after:left-0 after:h-6 after:w-6 after:rounded-md after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-green-300 peer-checked:after:translate-x-full"></div>
                            </label>
                            <p class="text-red-500 peer-has-[:checked]/switch-toggle:text-gray-500 order-1">Ẩn</p>
                            <p class="text-gray-500 peer-has-[:checked]/switch-toggle:text-green-500 order-3">Hiện</p>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <div class="flex flex-row items-center justify-center gap-4">
                                <a href="/admin/category/edit/<?= $category['id'] ?>" class="text-blue-500 hover:font-semibold">Sửa</a>
                                <a href="/services/admin/category/delete?id=<?= $category['id'] ?>" class="text-red-500 hover:font-semibold">Xóa</a>
                            </div>
                        </td>
                    </tr>
                <?php
                    $id += 1;
                };
            } else { ?>
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center" colspan="5">Không có dữ liệu</td>
                </tr>
            <?php }; ?>
        </tbody>
    </table>
</form>