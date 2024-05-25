<?php
$error = $_SESSION['errors_code'] ?? [];
$username = $_SESSION['username'] ?? '';
$email = $_SESSION['email'] ?? '';
$password = $_SESSION['password'] ?? '';
$repassword = $_SESSION['repassword'] ?? '';
$role = $_SESSION['role'] ?? '';
?>

<h1 class="font-normal text-3xl text-gray-600 be-vietnam-pro-black mb-8">Thêm tài khoản</h1>

<form class="w-full bg-white p-6 rounded-lg shadow-lg" method="post" action="/services/account/create" enctype="multipart/form-data">
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
            Tên tài khoản
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" placeholder="Nhập tên tài khoản" value="<?= $username ?>" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
            Email
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Nhập email" value="<?= $email ?>" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            Mật khẩu
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="Nhập mật khẩu" value="<?= $password ?>" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="repassword">
            Nhập lại mật khẩu
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="repassword" name="repassword" type="password" placeholder="Nhập lại mật khẩu" value="<?= $repassword ?>" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2 w-fit" for="avatar">
            Ảnh đại diện
            <input class="hidden" id="avatar" name="avatar" type="file" accept="image/*">
            <img id="avatar-preview" class="mt-2 max-w-40 border border-dotted" src="/public/favicon.ico" alt="avatar">
        </label>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="role">
            Vai trò
        </label>
        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="role" name="role" required>
            <option value="1" <?= $role === 1 ? "selected" : "" ?>>Admin</option>
            <option value="0" <?= $role === 0 ? "selected" : "" ?>>Khách hàng</option>
        </select>
    </div>

    <div class="mt-8">
        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg">Tạo mới</button>
        <button type="reset" class="ml-4 px-4 py-2 bg-gray-400 text-white rounded-lg">Làm mới</button>
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