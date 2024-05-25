<main class="h-full text-gray-900 flex justify-center">
    <?php

    require_once 'layouts/auth/' . ["login", "register"][$type] . '.php';
    session_unset();
    ?>
</main>