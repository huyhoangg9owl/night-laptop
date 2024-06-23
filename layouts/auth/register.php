<?php
$username = $_SESSION['username'] ?? "";
$email = $_SESSION['email'] ?? "";
$password = $_SESSION['password'] ?? "";
$repassword = $_SESSION['repassword'] ?? "";
$errors_code = $_SESSION['errors_code'] ?? [];
$errors = json_decode(file_get_contents('errors/auth.json'), true);
?>

<form action="/services/account/register" method="post" class="animate-[sweepIn_1s_linear] max-w-screen-xl m-0 sm:m-10 bg-white dark:bg-slate-700 shadow sm:rounded-lg flex justify-center flex-1 overflow-hidden peer-checked/login:hidden">
    <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">
        <img class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat" src='https://storage.googleapis.com/devitary-image-host.appspot.com/15848031292911696601-undraw_designer_life_w96d.svg' alt="" />
    </div>
    <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12 flex flex-col items-center">
        <div class="w-full my-auto flex flex-col items-center">
            <h1 class="text-2xl xl:text-3xl font-extrabold dark:text-white">
                Đăng ký
            </h1>
            <div class="w-full h-full flex-1 mt-8">
                <div class="m-auto max-w-xs">
                    <label>
                        <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-<?= in_array("username_exist", $errors_code) ? "red-600" : "gray-200" ?> placeholder-gray-500 text-sm focus:outline-none focus:border-sky-600 focus:bg-white focus:invalid:border-red-600" type="text" name="username" placeholder="Tên tài khoản" minlength="3" value="<?= $username ?>" required />
                    </label>
                    <?php
                    if (in_array("username_exist", $errors_code)) {
                        echo "<span class='text-red-500 font-semibold text-xs'>" . $errors["username_exist"] . "</span>";
                    }
                    ?>

                    <label>
                        <input class=" w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-<?= in_array("email_exist", $errors_code) ? "red-600" : "gray-200" ?> placeholder-gray-500 text-sm focus:outline-none focus:border-sky-600 focus:bg-white focus:invalid:border-red-600 mt-5" type="email" name="email" placeholder="Email" required minlength="6" value="<?= $email ?>" />
                    </label>
                    <?php
                    if (in_array("email_exist", $errors_code)) {
                        echo "<span class='text-red-500 font-semibold text-xs'>" . $errors["email_exist"] . "</span>";
                    }
                    ?>

                    <label>
                        <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-sky-600 focus:bg-white focus:invalid:border-red-600 mt-5" type="password" name="password" placeholder="Mật khẩu" required minlength="6" value="<?= $password ?>" />
                    </label>

                    <label>
                        <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-<?= in_array("password_not_match", $errors_code) ? "red-600" : "gray-200" ?> placeholder-gray-500 text-sm focus:outline-none focus:border-sky-600 focus:bg-white focus:invalid:border-red-600 mt-5" type="password" name="repassword" placeholder="Nhập lại mật khẩu" required minlength="6" value="<?= $repassword ?>" />
                    </label>
                    <?php
                    if (in_array("password_not_match", $errors_code)) {
                        echo "<span class='text-red-500 font-semibold text-xs'>" . $errors["password_not_match"] . "</span>";
                    }
                    ?>

                    <button class="mt-5 tracking-wide font-semibold bg-indigo-500 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none" type="submit">
                        <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                            <circle cx="8.5" cy="7" r="4" />
                            <path d="M20 8v6M23 11h-6" />
                        </svg>
                        <span class="ml-3">
                            Đăng ký
                        </span>
                    </button>

                    <span class="mt-3 text-center block text-gray-400 text-xs">
                        Đã có tài khoản?
                        <a href="/auth" class="text-sky-400 underline">Đăng nhập</a>
                        tại đây
                    </span>
                </div>
            </div>
        </div>
    </div>
</form>