<?php
/**
 * Created by PhpStorm.
 * User: chin39
 * Date: 2017/11/15
 * Time: 11:01
 */

include_once $_SERVER["DOCUMENT_ROOT"] . "/db/conn.php";

function all_subscription()
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Website", "*");
    return $data;
}

function search_subscription($subscription)
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Website", "*", [
        "Website_ID" => $subscription['Website_ID']
    ]);
    return $data;
}

function search_subscription_ID($subscription_ID)
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Website", "*", [
        "Website_ID" => $subscription_ID
    ]);
    return $data;
}

function find_subscription_client($subscription)
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Company", "*", [
        "Company_ID" => $subscription['Company_ID']
    ]);
    return $data;
}

function add_new_subscription($subscription)
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Company", "*", [
        "Company_ID" => $subscription['Company_ID']
    ]);

}