<?php
/**
 * Created by PhpStorm.
 * User: chin39
 * Date: 2017/11/14
 * Time: 16:17
 */

require_once 'login.php';

if (!auth_check()) {
    header('Location:' . $_SERVER['DOCUMENT_ROOT'] . '/index.php');
}