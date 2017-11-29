<?php
/**
 * Created by PhpStorm.
 * User: chin39
 * Date: 2017/11/15
 * Time: 11:01
 */

require_once $_SERVER["DOCUMENT_ROOT"] . "/db/conn.php";

/* Return all users in database */
function all_users()
{
	$data_conn = connection();
    $data = $data_conn->select("CMK_User", "*", [
        "Status" => "1",
        "ORDER" => ["FirstName", "LastName", "Email_Address"]
    ]);
    return $data;
}