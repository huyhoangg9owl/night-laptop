<?php
$error = $_SESSION['error'] ?? null;
echo $error ? "<p class='text-red-500'>$error</p>" : '';
?>

<h1 class="font-normal text-3xl text-gray-600 be-vietnam-pro-black mb-8">Sửa sản phẩm</h1>

<form class="w-full bg-white p-6 rounded-lg shadow-lg" method="post" action="/services/admin/product/update" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            Tên sản phẩm
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="Nhập tên sản phẩm" value="<?= $product['name'] ?>" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
            Giá sản phẩm
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" name="price" type="number" placeholder="Nhập giá sản phẩm" value="<?= (int)$product['price'] ?>" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
            Mô tả sản phẩm
        </label>
        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" placeholder="Nhập mô tả sản phẩm" required><?= $product['description'] ?></textarea>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2 w-fit" for="thumbnail_image">
            Ảnh bìa sản phẩm
            <input class="hidden" id="thumbnail_image" name="thumbnail_image" type="file" accept="image/*">
            <img id="thumbnail-preview" class="mt-2 max-w-40 border border-dotted" src="<?= $product_thumbnail["image_url"] ?? "/public/favicon.ico" ?>" alt="thumbnail">
        </label>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="quantity">
            Số lượng sản phẩm
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="quantity" name="quantity" type="number" placeholder="Nhập số lượng sản phẩm" value="<?= $product['quantity'] ?>" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="category_id">
            Danh mục sản phẩm
        </label>
        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="category_id" name="category_id" required>
            <?php foreach ($categories as $category) { ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
            Trạng thái
        </label>
        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="status" name="status" required>
            <option value="1">Kích hoạt</option>
            <option value="0">Không kích hoạt</option>
        </select>
    </div>

    <div class="mt-8">
        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg">Cập nhật</button>
        <button type="reset" class="ml-4 px-4 py-2 bg-gray-400 text-white rounded-lg">Làm mới</button>
    </div>
</form>

<script>
    document.getElementById('thumbnail_image').addEventListener('change', function() {
        const file = this.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("thumbnail-preview").src = e.target.result;
        }
        reader.readAsDataURL(file);
    });
    ClassicEditor
        .create(document.querySelector('#description'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>