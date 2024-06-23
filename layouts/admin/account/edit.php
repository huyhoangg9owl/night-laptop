<form action="/services/admin/account/update" method="post" class="px-4 w-full flex flex-row gap-6" enctype="multipart/form-data">
    <input type="number" class="hidden" name="id" value="<?= $account['id'] ?>">
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

        <div class="mt-8">
            <button type="submit" class="px-5 py-2 bg-sky-600 rounded font-normal text-white">Thay đổi</button>
            <a href="/admin/account" class="px-5 py-2 bg-red-600 rounded ml-4 font-normal text-white">Hủy</a>
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