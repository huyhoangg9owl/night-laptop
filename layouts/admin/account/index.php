<form action="/services/account/toggle_status" method="get">
    <h1 class="font-normal text-3xl text-gray-600 be-vietnam-pro-black">Tài khoản</h1>
    <a href="/admin/account/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-4 flex flex-row items-center justify-center w-fit">
        <?php
        Icon('plus', 'w-5 h-5 inline-block mr-2');
        ?>
        Thêm mới
    </a>
    <table class="w-full mt-4 table-fixed">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Avatar</th>
                <th class="border border-gray-300 px-4 py-2">Tên</th>
                <th class="border border-gray-300 px-4 py-2">Vai trò</th>
                <th class="border border-gray-300 px-4 py-2">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($accounts)) {
                $id = 1;
                foreach ($accounts as $account) {
                    $account_profile = $Account->getAccountProfile($account['id']);
            ?>
                    <tr class="w-full">
                        <td class="border border-gray-300 px-4 py-2">
                            <p class="line-clamp-1 text-center"><?= $id ?></p>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <img src="<?= $account_profile['avatar'] ?>" alt="<?= $account['username'] ?>" class="size-16 mx-auto" />
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <p class="line-clamp-1 text-center"><?= $account['username'] ?></p>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <p class="line-clamp-1 text-center"><?= (int)$account_profile['role'] ? "Admin" : "Khách hàng" ?></p>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <div class="flex flex-row items-center justify-center gap-4">
                                <a href="/admin/account/edit/<?= $account['id'] ?>" class="text-blue-500 hover:font-semibold">Sửa</a>
                                <?php
                                if ($account['id'] != $Account->getAccountId()) :
                                ?>
                                    <a href="/services/account/delete?id=<?= $account['id'] ?>" class="text-red-500 hover:font-semibold">Xóa</a>
                                <?php
                                endif;
                                ?>
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