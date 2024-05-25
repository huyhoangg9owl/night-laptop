<?php
$name = $_SESSION['name'] ?? "";
$error = $_SESSION['error'] ?? null;
?>

<h1 class="font-normal text-3xl text-gray-600 be-vietnam-pro-black mb-8">Thêm danh mục</h1>

<form class="max-w-lg bg-white p-6 rounded-lg shadow-lg" method="post" action="/services/category/create">
    <label class="text-xl" for="name">Tên</label>
    <div class="mt-2 w-full">
        <input type="text" class="w-full bg-gray-100 px-4 py-2 rounded-lg <?= $error ? "border border-red-500" : "" ?>" id="name" placeholder="Nhập tên danh mục" name="name" value="<?= $name ?>" required>
    </div>
    <?php if ($error) : ?>
        <p class="text-red-500 mt-2"><?= $error ?></p>
    <?php endif; ?>
    <div class="mt-8">
        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg">Tạo mới</button>
        <button type="reset" class="ml-4 px-4 py-2 bg-gray-400 text-white rounded-lg">Làm mới</button>
    </div>
</form>

<?php
session_unset();
?>