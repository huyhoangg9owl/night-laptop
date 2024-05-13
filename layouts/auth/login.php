<?php
$username = $_SESSION['username'] ?? "";
$password = $_SESSION['password'] ?? "";
$errors_code = $_SESSION['errors_code'] ?? [];
$errors = json_decode(file_get_contents('errors/auth.json'), true);
?>

<form action="/services/account/login" method="post"
      class="animate-[sweepIn_1s_linear] max-w-screen-xl m-0 sm:m-10 bg-white dark:bg-slate-700 shadow sm:rounded-lg flex justify-center flex-1 overflow-hidden peer-checked/register:hidden">
    <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12 flex flex-col items-center">
        <div class="w-full my-auto flex flex-col items-center">
            <h1 class="text-2xl xl:text-3xl font-extrabold dark:text-white">
                Đăng nhập
            </h1>
            <div class="w-full h-full flex-1 mt-8">
                <div class="m-auto max-w-xs">
                    <label>
                        <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-<?= in_array("missing_username", $errors_code) || in_array("wrong_username", $errors_code) ? "red-600" : "gray-200" ?> placeholder-gray-500 text-sm focus:outline-none focus:bg-white focus:border-sky-600 focus:invalid:border-red-400"
                               type="text" placeholder="Email hoặc tên tài khoản" required name="username"
                               value="<?= $username ?>"/>
                    </label>

                    <?php
                    if (in_array("missing_username", $errors_code))
                        echo "<p class='text-red-500 text-xs mt-2 font-semibold'>" . $errors["missing_username"] . "</p>";
                    ?>

                    <?php
                    if (in_array("wrong_username", $errors_code))
                        echo "<p class='text-red-500 text-xs mt-2 font-semibold'>" . $errors["wrong_username"] . "</p>";
                    ?>

                    <label>
                        <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-<?= in_array("missing_password", $errors_code) || in_array("wrong_password", $errors_code) ? "red-600" : "gray-200" ?> placeholder-gray-500 text-sm focus:outline-none focus:border-sky-600 focus:invalid:border-red-400 focus:bg-white mt-5"
                               type="password" placeholder="Mật khẩu" required name="password"
                               value="<?= $password ?>"/>
                    </label>

                    <?php
                    if (in_array("missing_password", $errors_code))
                        echo "<p class='text-red-500 text-xs mt-2 font-semibold'>" . $errors["missing_password"] . "</p>";
                    ?>

                    <?php
                    if (in_array("wrong_password", $errors_code))
                        echo "<p class='text-red-500 text-xs mt-2 font-semibold'>" . $errors["wrong_password"] . "</p>";
                    ?>

                    <a href="/auth?t=2" class="text-sm text-sky-500 hover:underline mt-2 block">Quên mật khẩu?</a>

                    <button class="mt-5 tracking-wide font-semibold bg-indigo-500 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none"
                            type="submit">
                        <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                            <circle cx="8.5" cy="7" r="4"/>
                        </svg>
                        <span class="ml-3">
                            Đăng nhập
                        </span>
                    </button>
                    <span class="mt-3 text-center block text-gray-400 text-xs">
                        Chưa có tài khoản?
                        <a href="/auth?t=1" class="text-sky-400 underline">Đăng ký</a>
                        tại đây
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">
        <img class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
             src='https://storage.googleapis.com/devitary-image-host.appspot.com/15848031292911696601-undraw_designer_life_w96d.svg'
             alt=""/>
    </div>
</form>