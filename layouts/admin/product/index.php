<form action="/services/admin/product/toggle_status" method="get">
    <h1 class="font-normal text-3xl text-gray-600 be-vietnam-pro-black">Sản phẩm</h1>
    <a href="/admin/product/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-4 flex flex-row items-center justify-center w-fit">
        <?php
        Icon('plus', 'w-5 h-5 inline-block mr-2');
        ?>
        Thêm mới
    </a>
    <table class="w-full mt-4 table-fixed">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2" colspan="2">Sản phẩm</th>
                <th class="border border-gray-300 px-4 py-2">Giá</th>
                <th class="border border-gray-300 px-4 py-2">Danh mục</th>
                <th class="border border-gray-300 px-4 py-2">Số lượng</th>
                <th class="border border-gray-300 px-4 py-2">Tình trạng</th>
                <th class="border border-gray-300 px-4 py-2">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($products)) {
                $id = 1;
                foreach ($products as $product) {
                    $thumbnail = $Product->getProductThumbnail($product['id'])['image_url'] ?? "/public/favicon.ico";
                    $category = $Product->getProductCategory($product['category_id'])['name'];
            ?>
                    <tr class="w-full <?= $product['visibility'] ? "" : "bg-gray-200" ?>">
                        <td colspan="2" class="border border-gray-300 px-4 py-2">
                            <div class="w-full flex flex-row items-center justify-start gap-2">
                                <img src="<?= $thumbnail ?>" alt="<?= $product['name'] ?>" class="size-16" />
                                <p class="line-clamp-1"><?= $product['name'] ?></p>
                            </div>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <p class="line-clamp-1 text-center"><?= number_format($product['price'], 0, "", ",") ?></p>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <p class="line-clamp-1 text-center"><?= $category ?></p>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <p class="line-clamp-1 text-center"><?= $product['quantity'] ?></p>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <p class="line-clamp-1 text-center"><?= $product['visibility'] ? "Còn hàng" : "Ẩn" ?></p>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <div class="flex flex-row items-center justify-center gap-4">
                                <a href="/admin/product/edit/<?= $product['id'] ?>" class="text-blue-500 hover:font-semibold">Sửa</a>
                                <a href="/services/admin/product/delete?id=<?= $product['id'] ?>" class="text-red-500 hover:font-semibold">Xóa</a>
                            </div>
                        </td>
                    </tr>
                <?php
                    $id += 1;
                };
            } else { ?>
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center" colspan="7">Không có dữ liệu</td>
                </tr>
            <?php }; ?>
        </tbody>
    </table>
</form>