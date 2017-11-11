<?php
/**
 * Created by PhpStorm.
 * User: chin39
 * Date: 2017/11/11
 * Time: 13:04
 */

//require_once '../db/conn.php';


/** Return certain company search by name
 * @param $name
 * @return array|bool
 */


require_once '../db/conn.php';

function company_name($name)
{
    $data_conn = connection();
    $data = $data_conn->select("CMK-Company", "*", [
        "Companyname[~]" => "%$name%"
    ]);
    return $data;
}

/** Return all company in databases
 * @return array|bool
 */
function all_company()
{
    $data_conn = connection();
    $data = $data_conn->select("CMK-Company", "*");
    return $data;
}

$test = company_name("lol");