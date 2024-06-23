<form action="" method="POST" class="max-w-4xl mx-auto my-10 bg-white p-5 rounded-lg shadow-xl h-full flex flex-col">
    <h1 class="text-center text-4xl font-bold mb-4">Tóm tắt đơn hàng</h1>

    <div class="mb-4">
        <h3 class="text-xl font-medium">Thông Tin Giao Hàng</h3>
        <div class="w-full flex flex-row items-center justify-center gap-6">
            <div class="mt-2 w-full">
                <label class="tracking-wide text-gray-700 text-sm font-bold mb-2" for="name_reciver">
                    Tên người nhận
                </label>
                <input class="text-gray-600 border w-full px-4 py-2 rounded-lg" value="<?= $account['username'] ?>" placeholder="Vui lòng nhập tên người nhận hàng!" name="name_reciver" id="name_reciver" required />
            </div>
            <div class="mt-2 w-full">
                <label class="tracking-wide text-gray-700 text-sm font-bold mb-2" for="phone_number">
                    Số điện thoại
                </label>
                <input class="text-gray-600 border w-full px-4 py-2 rounded-lg" value="<?= $account_payment['phone_number'] ?>" placeholder="Vui lòng nhập số điện thoại nhận hàng!" name="phone_number" id="phone_number" required />
            </div>
        </div>
        <div class="mt-2 w-full">
            <label class="tracking-wide text-gray-700 text-sm font-bold mb-2" for="address">
                Địa chỉ giao hàng
            </label>
            <input class="text-gray-600 border w-full px-4 py-2 rounded-lg" value="<?= $account_payment['address'] ?>" placeholder="Vui lòng nhập địa chỉ giao hàng!" name="address" id="address" required />
        </div>
    </div>

    <div class="mb-4 max-h-full w-full overflow-hidden flex flex-col">
        <h3 class="text-xl font-medium">Sản Phẩm</h3>
        <div class="mt-2 space-y-4 overflow-auto">
            <?php
            foreach ($cart as $item) :
            ?>
                <div class="flex justify-between items-center bg-gray-50 p-4 rounded-lg">
                    <div class="flex flex-row items-center justify-center gap-2">
                        <img class="size-16" src="<?= $item['image_url'] ?>" alt="<?= $item['name'] ?>" />
                        <div>
                            <p class="text-gray-800 font-medium"><?= $item['name'] ?></p>
                            <p class="text-gray-600">Số lượng: <?= $item['quantity'] ?></p>
                        </div>
                    </div>
                    <p class="text-gray-800 font-medium"><?= number_format($item['price'] * $item['quantity'], 0, "", ",") ?>đ</p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <fieldset class="mb-4 mt-auto">
        <legend class="text-xl font-medium text-slate-900 dark:text-slate-200">Phương thức thanh toán</legend>
        <div class="mt-4 flex flex-row items-center justify-center gap-4">
            <label for="cod" class="text-slate-700 has-[:checked]:ring-indigo-200 has-[:checked]:text-indigo-900 has-[:checked]:bg-indigo-50 flex flex-row items-center justify-between gap-6 rounded-lg p-4 ring-1 ring-transparent hover:bg-slate-100 w-full">
                Thanh toán khi nhận hàng (COD)
                <input name="payment_method" id="cod" value="2" type="radio" class="box-content h-1.5 w-1.5 appearance-none rounded-full border-[5px] border-white bg-white bg-clip-padding outline-none ring-1 ring-gray-950/10 checked:border-indigo-500 checked:ring-indigo-500" checked="<?= $account_payment["payment_type"] === 2 ? "true" : "false" ?>">
            </label>
        </div>
    </fieldset>

    <div class="mb-4 border-t border-gray-200 pt-4">
        <div class="flex justify-between">
            <p class="text-gray-800 font-medium">Tổng Cộng:</p>
            <p class="text-gray-800 font-medium">
                <?= number_format($Cart->total(), 0, '', ',') ?> đ
            </p>
        </div>
    </div>
    <div class="w-full mt-4 flex flex-row items-center justify-center gap-4">
        <a href="/account/cart" class="px-6 py-4 bg-slate-100 rounded-lg w-1/3 text-gray-400 hover:text-white hover:bg-red-400 hover:font-bold transition-colors duration-500 text-center">Hủy bỏ</a>
        <button class="px-6 py-4 bg-green-300 font-bold text-white rounded-lg w-full hover:bg-green-400 transition-colors duration-500" type="submit" name="checkout">Thanh toán</button>
    </div>
</form>