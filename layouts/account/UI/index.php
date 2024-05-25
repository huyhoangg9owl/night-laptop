<form action="/services/account/update" method="post" class="px-4 w-full flex flex-row gap-6" enctype="multipart/form-data">
    <div class="w-3/4">
        <h1 class="text-2xl font-semibold mb-4">Thông tin tài khoản</h1>
        <div class="w-full flex flex-row gap-4 pl-4">
            <div class="w-full">
                <label for="username" class="text-lg font-normal">Tên tài khoản</label>
                <input type="text" name="username" id="username" class="w-full border border-gray-300 rounded-md p-2 mt-1 dark:text-black" value="<?= $account['username'] ?>">
            </div>
            <div class="w-full">
                <label for="email" class="text-lg font-normal">Email</label>
                <input type="text" name="email" id="email" class="w-full border border-gray-300 rounded-md p-2 mt-1 dark:text-black" value="<?= $account['email'] ?>">
            </div>
        </div>
        <p class="text-center mt-2 text-sm text-red-600 dark:text-red-400 font-semibold">Lưu ý: Thay đổi một trong hai
            dữ liệu trên
            cần đăng nhập
            lại</p>

        <h1 class="text-2xl font-semibold mt-8 mb-4">Thông tin thanh toán</h1>
        <div class="w-full flex flex-row gap-4 pl-4">
            <div class="w-full">
                <label for="phone" class="text-lg font-normal">Số điện thoại</label>
                <input type="text" name="phone" id="phone" class="w-full border border-gray-300 rounded-md p-2 mt-1 dark:text-black" value="<?= $account_payment['phone_number'] ?? "" ?>">
            </div>
            <div class="w-full">
                <label for="address" class="text-lg font-normal">Địa chỉ (Mặc định)</label>
                <input type="text" name="address" id="address" class="w-full border border-gray-300 rounded-md p-2 mt-1 dark:text-black" value="<?= $account_payment['address'] ?? "" ?>">
            </div>
        </div>
        <div class="w-full mt-4 pl-4 flex flex-row gap-8">
            <p class="text-lg font-normal">Phương thức thanh toán (Mặc định)</p>
            <div class="flex flex-row gap-4 mt-2">
                <div class="flex flex-row items-center justify-center gap-2" title="Chưa hỗ trợ!">
                    <input type="radio" name="payment_method" id="payment_method_1" value="1" disabled>
                    <label for="payment_method_1" class="text-sm font-normal">Visa</label>
                </div>
                <div class="flex flex-row items-center justify-center gap-2" title="Chưa hỗ trợ!">
                    <input type="radio" name="payment_method" id="payment_method_2" value="2" disabled>
                    <label for="payment_method_2" class="text-sm font-normal">MoMo</label>
                </div>
                <div class="flex flex-row items-center justify-center gap-2" title="Chưa hỗ trợ!">
                    <input type="radio" name="payment_method" id="payment_method_3" value="3" disabled>
                    <label for="payment_method_3" class="text-sm font-normal">Paypal</label>
                </div>
                <div class="flex flex-row items-center justify-center gap-2" title="Thanh toán sau khi nhận hàng.">
                    <input type="radio" name="payment_method" id="payment_method_4" value="4" checked>
                    <label for="payment_method_4" class="text-sm font-normal">Thanh toán khi nhận hàng</label>
                </div>
            </div>
        </div>

        <h1 class="text-2xl font-semibold mt-8 mb-4">Đổi mật khẩu</h1>
        <div class="w-full flex flex-row gap-4 pl-4">
            <div class="w-full">
                <label for="new_password" class="text-lg font-normal">Mật khẩu mới</label>
                <input type="text" name="new_password" id="new_password" class="w-full border border-gray-300 rounded-md p-2 mt-1 dark:text-black" value="">
            </div>
            <div class="w-full">
                <label for="confirm_new_password" class="text-lg font-normal">Xác nhận mật khẩu mới</label>
                <input type="text" name="confirm_new_password" id="confirm_new_password" class="w-full border border-gray-300 rounded-md p-2 mt-1 dark:text-black" value="">
            </div>
        </div>

        <div class="mt-8">
            <button type="submit" class="px-5 py-2 bg-sky-600 rounded font-normal text-white">Thay đổi</button>
            <button type="reset" class="px-5 py-2 bg-red-600 rounded ml-4 font-normal text-white">Hủy</button>
        </div>
    </div>
    <div class="w-1/4 flex flex-col items-center">
        <span class="text-lg font-normal mb-2">Ảnh đại diện</span>
        <label for="avatar" class="size-48 relative cursor-pointer rounded-full overflow-hidden group/avatar flex flex-col items-center justify-center">
            <img src="<?= $account_profile['avatar'] ?>" alt="avatar" class="w-full" id="avatar-preview">
            <input type="file" name="avatar" id="avatar" class="hidden" accept="image/*">
            <div class="group-hover/avatar:flex w-full h-full absolute top-0 left-0 bg-black/20 hidden flex-col items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-6 fill-white">
                    <path d="M288 109.3V352c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3l-73.4 73.4c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l128-128c12.5-12.5 32.8-12.5 45.3 0l128 128c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L288 109.3zM64 352H192c0 35.3 28.7 64 64 64s64-28.7 64-64H448c35.3 0 64 28.7 64 64v32c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V416c0-35.3 28.7-64 64-64zM432 456a24 24 0 1 0 0-48 24 24 0 1 0 0 48z" />
                </svg>
            </div>
        </label>
    </div>
</form>
<script>
    document.getElementById('avatar').addEventListener('change', function() {
        const file = this.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("avatar-preview").src = e.target.result;
        }
        reader.readAsDataURL(file);
    });
</script>