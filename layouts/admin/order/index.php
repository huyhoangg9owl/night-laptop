<?php
$tabs = [
    "/" => "Tất cả",
    "/confirm" => "Chờ xác nhận",
    "/shipping" => "Đang vận chuyển",
    "/shipped" => "Đã giao hàng",
    "/cancel" => "Đã hủy"
];

$currentTab = $_SERVER['REQUEST_URI'];
$currentTab = str_replace("/admin/order", "", $currentTab);
$currentTab = $currentTab == "" ? "/" : $currentTab;
?>


<h1 class="font-normal text-3xl text-gray-600 be-vietnam-pro-black">Đơn hàng</h1>

<article class="w-full mt-6 rounded-lg shadow overflow-hidden">
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
    <div class="w-full">
        <div class="grid grid-cols-[repeat(22,1fr)] bg-yellow-400/30 border-b border-b-gray-300">
            <div class="col-span-2"></div>
            <div class="col-span-3 text-center font-medium py-6">Hình ảnh</div>
            <div class="col-span-3 text-center font-medium py-6">Sản phẩm</div>
            <div class="col-span-3 text-center font-medium py-6">Số lượng</div>
            <div class="col-span-3 text-center font-medium py-6">Giá</div>
            <div class="col-span-3 text-center font-medium py-6">Số đơn</div>
            <div class="col-span-3 text-center font-medium py-6">Tình trạng</div>
            <div class="col-span-2"></div>
        </div>
        <?php if (!isset($products) || empty($products)) { ?>
            <div class="w-full py-6 text-center">Chưa có sản phẩm nào</div>
            <?php } else {
            foreach ($products as $product) {
                $product_thumbnail = $Product->getProductThumbnail($product['id']);
            ?>
                <div class="grid grid-cols-[repeat(22,1fr)] py-6">
                    <div class="col-span-2">
                    </div>
                    <div class="col-span-3 flex items-center justify-center">
                        <img src="<?= $product_thumbnail ? $product_thumbnail['image_url'] : "/public/favicon.ico" ?>" alt="" class="w-20 h-20 object-cover rounded-lg">
                    </div>
                    <div class="col-span-3 flex items-center justify-center">
                        <a href="/admin/product/1" class="hover:text-blue-500 hover:underline transition-colors duration-300">
                            <?= $product['name'] ?>
                        </a>
                    </div>
                    <div class="col-span-3 flex items-center justify-center">
                        <?= $product['quantity'] ?>
                    </div>
                    <div class="col-span-3 flex items-center justify-center">
                        <?= number_format($product['price'], 0, '', ',') ?>
                    </div>
                    <div class="col-span-3 flex items-center justify-center">
                        123456
                    </div>
                    <div class="col-span-3 flex items-center justify-center">
                        <span class="text-green-500 font-medium">Còn hàng</span>
                    </div>
                    <label class="col-span-2 flex items-center justify-center peer">
                        <input type="checkbox" class="hidden peer">
                        <?php Icon("next_arrow", "-rotate-90 peer-checked:rotate-90 transition-transform duration-300"); ?>
                    </label>
                    <div class="hidden col-span-full row-span-2 w-full mt-6 border-t border-t-gray-300 peer-has-[:checked]:block animate-[opacityIn_.3s_linear]">
                        <div class="w-full table table-fixed border-collapse">
                            <div class="w-full table-row-group">
                                <div class="table-row w-full border-b border-gray-300 py-6 bg-yellow-200/40">
                                    <div class="table-cell w-[calc(100%/(22/2))]"></div>
                                    <div class="table-cell py-6 font-medium text-center">Mã đơn hàng</div>
                                    <div class="table-cell py-6 font-medium text-center">Khách hàng</div>
                                    <div class="table-cell py-6 font-medium text-center">Số lượng</div>
                                    <div class="table-cell py-6 font-medium text-center">Tổng</div>
                                    <div class="table-cell py-6 font-medium text-center">Địa chỉ</div>
                                    <div class="table-cell py-6 font-medium text-center">Trạng thái</div>
                                    <div class="table-cell w-[calc(100%/(22/2))]"></div>
                                </div>
                            </div>
                            <div class="w-full table-row-group">
                                <div class="w-full table-row border-b last:border-b-0 border-b-gray-300">
                                    <div class="table-cell w-[calc(100%/(22/2))]"></div>
                                    <div class="text-center pt-6 table-cell" colspan="3">
                                        1
                                    </div>
                                    <div class="text-center pt-6 table-cell" colspan="3">
                                        <a href="/admin/account/edit/1" class="text-blue-500 hover:underline">Nguyễn Văn A</a>
                                    </div>
                                    <div class="text-center pt-6 table-cell" colspan="3">1</div>
                                    <div class="text-center pt-6 table-cell" colspan="3">20.000đ</div>
                                    <div class="text-center pt-6 table-cell" colspan="3">
                                        123, Đường ABC, Quận XYZ, TP. HCM
                                    </div>
                                    <div class="text-gray-500 font-medium px-2 table-cell" colspan="3">
                                        <select name="status" id="status" class="w-full h-8 px-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-400">
                                            <option value="1">Chờ xác nhận</option>
                                            <option value="2">Đang vận chuyển</option>
                                            <option value="3">Đã giao hàng</option>
                                            <option value="4">Đã hủy</option>
                                        </select>
                                    </div>
                                    <div class="px-2 table-cell w-[calc(100%/(22/2))]">
                                        <button class="w-full h-10 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors duration-300">Lưu</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
</article>