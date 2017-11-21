<?php
/**
 * Created by PhpStorm.
 * User: chin39
 * Date: 2017/11/15
 * Time: 11:01
 */

include_once $_SERVER["DOCUMENT_ROOT"] . "/db/conn.php";

/* Return all projects in database */
function all_projects()
{
	$data_conn = connection();
    $data = $data_conn->select("Client_Project", "*", [
        "Status" => "1"
    ]);
    return $data;
}

/* Search through project-related data */
function search_project($project_ID)
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Project", "*", [
        "Project_ID" => $project_ID,
        "Status" => "1"
    ]);
    return $data;
}

function find_project_client($project)
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Company", "*", [
        "Company_ID" => $project['Company_ID'],
        "Status" => "1"
    ]);
    return $data;
}