<?php
/**
 * Created by PhpStorm.
 * User: chin39
 * Date: 2017/11/14
 * Time: 16:17
 */

require_once __DIR__ . "/../accounts/login.php";


if (!auth_check()) {
    $message = "Please login";

    echo "<script>alert('$message');
        window.location.href='/index.php';
        </script>";
}
