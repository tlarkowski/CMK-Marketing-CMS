<?php
/**
 * Created by PhpStorm.
 * User: chin39
 * Date: 2017/11/15
 * Time: 11:01
 */

require_once $_SERVER["DOCUMENT_ROOT"] . "/db/conn.php";

/* Return all subscriptions in database */
function all_subscriptions()
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Website", "*", [
        "Status" => "1",
        "ORDER" => ["Annual_Renewal", "Domain", "Site_Name"]
    ]);
    return $data;
}

/*$timespan is sent through as a form of "# time-unit" (eg. "2 week")*/
function subscription_due($timespan)
{
    $data_conn = connection();
    $today = date("Y-m-d H:i:s");
    $timespan = date("Y-m-d H:i:s", strtotime($timespan));

    $data = $data_conn->select("Client_Website", "*", [
        "Status" => "1",
        "ORDER" => ["Annual_Renewal", "Domain", "Site_Name"],
        "Annual_Renewal[<>]" => [$today, $timespan]
    ]);

    return $data;
}

/* Search through subscription-related data */
function search_subscription($subscription_ID)
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Website", "*", [
        "Website_ID" => $subscription_ID,
        "Status" => "1",
        "ORDER" => ["Annual_Renewal", "Domain", "Site_Name"]
    ]);
    return $data;
}

function search_subscriptionByName($subscription_name)
{
    $data_conn = connection();
    $data = $data_conn->select("Client_Website", "*", [
        "Site_Name" => $subscription_name,
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