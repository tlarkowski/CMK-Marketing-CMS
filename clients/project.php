<?php
/**
 * Created by PhpStorm.
 * User: chin39
 * Date: 2017/11/15
 * Time: 11:01
 */

include_once $_SERVER["DOCUMENT_ROOT"] . "/db/conn.php";

function all_project()
{
	$data_conn = connection();
    $data = $data_conn->select("Client_Project", "*");
    return $data;
}

function find_project_client($project)
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Company", "*", [
        "Company_ID" => $project['Company_ID']
    ]);
    return $data;
}