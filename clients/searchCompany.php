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

//todo: add status check, so we could filter the results


include_once $_SERVER["DOCUMENT_ROOT"] . "/db/conn.php";

function search_company_Like($name)
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Company", "*", [
        "Companyname[~]" => "%$name%"
    ]);
    return $data;
}

function search_company($name)
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Company", "*", [
        "Companyname" => "$name"
    ]);
    return $data;
}

function search_company_subscription($company)
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Website", "*", [
        "Company_ID" => $company['Company_ID']
    ]);
    return $data;
}

function search_company_project($company)
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Project", "*", [
        "Company_ID" => $company['Company_ID']
    ]);
    return $data;
}

/** Return all company in databases
 * @return array|bool
 */
function all_company()
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Company", "*");
    return $data;
}
