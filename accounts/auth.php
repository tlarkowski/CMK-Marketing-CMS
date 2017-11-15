<?php
/**
 * Created by PhpStorm.
 * User: chin39
 * Date: 2017/11/14
 * Time: 16:17
 */

function auth_check()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        return false;
    }
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }

}