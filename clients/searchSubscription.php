<?php
/**
 * Created by PhpStorm.
 * User: chin39
 * Date: 2017/11/15
 * Time: 11:01
 */

include_once $_SERVER["DOCUMENT_ROOT"] . "/db/conn.php";

/* Return all subscriptions in database */
function all_subscriptions()
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Website", "*", [
        "Status" => "1"
    ]);
    return $data;
}

/* Search through subscription-related data */
function search_subscription($subscription_ID)
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Website", "*", [
        "Website_ID" => $subscription_ID,
        "Status" => "1"
    ]);
    return $data;
}

function find_subscription_client($subscription)
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Company", "Companyname", [
        "Company_ID" => $subscription['Company_ID'],
        "Status" => "1"
    ]);
    return $data;
}

function all_subscription_client_info($project)
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Company", "*", [
        "Company_ID" => $project['Company_ID'],
        "Status" => "1"
    ]);
    return $data;
}