<?php
if (isset($_POST)) {
    echo json_encode($_POST);
}
?>

<form class="w-full bg-white p-6 rounded-lg shadow-lg" method="post" enctype="multipart/form-data">
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
            Mô tả sản phẩm
        </label>
        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" placeholder="Nhập mô tả sản phẩm" required></textarea>
    </div>
    <div class="mt-8">
        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg">Tạo mới</button>
        <button type="reset" class="ml-4 px-4 py-2 bg-gray-400 text-white rounded-lg">Làm mới</button>
    </div>
</form>