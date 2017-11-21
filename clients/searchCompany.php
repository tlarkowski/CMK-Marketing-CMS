<?php
/**
 * Created by PhpStorm.
 * User: chin39
 * Date: 2017/11/11
 * Time: 13:04
 */

include_once $_SERVER["DOCUMENT_ROOT"] . "/db/conn.php";

/* Return all companies in database */
function all_companies()
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Company", "*", [
        "Status" => "1"
    ]);
    return $data;
}

/* Search through company-related data */
function search_company_Like($name)
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Company", "*", [
        "Companyname[~]" => "%$name%",
        "Status" => "1"
    ]);
    return $data;
}

function search_company($name)
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Company", "*", [
        "Companyname" => "$name",
        "Status" => "1"
    ]);
    return $data;
}

function search_company_subscription($company)
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Website", "*", [
        "Company_ID" => $company['Company_ID'],
        "Status" => "1"
    ]);
    return $data;
}

function search_company_project($company)
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Project", "*", [
        "Company_ID" => $company['Company_ID'],
        "Status" => "1"
    ]);
    return $data;
}

?>