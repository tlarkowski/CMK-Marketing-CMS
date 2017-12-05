<?php
/**
 * Created by PhpStorm.
 * User: chin39
 * Date: 2017/11/11
 * Time: 15:59
 * @param $company
 */
date_default_timezone_set("EST");
include_once $_SERVER["DOCUMENT_ROOT"] . "/clients/searchSubscription.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/db/conn.php";


/** add new subscription info
 * @param $subscription
 * @return int|mixed "Id of add record"|
 * @throws Exception
 */
function addSubscription($subscription)
{
    $data_conn = connection();
    $temp = search_subscriptionByName($subscription['Site_Name']);

    if (count($temp) == 0) {
        $data_conn->insert("Client_Website", [
            "Company_ID" => $subscription['Company_ID'],
            "Site_Name" => $subscription['Site_Name'],
            "Status" => "1",
            "Domain" => $subscription['Domain'],
            "GoLive_Date" => $subscription['GoLive_Date'],
            "Project_Start" => $subscription['Project_Start'],
            "Hours_Tracked" => $subscription['Hours_Tracked'],
            "Hours_Planned" => $subscription['Hours_Planned'],
            "Type" => $subscription['Type'],
            "Project_Cost_Billed" => $subscription['Pay'],
            "Host_Location" => $subscription['Host_Location'],
            "Annual_Renewal" => $subscription['Annual_Renewal'],
            "Notes" => $subscription['Notes']
        ]);
        return $data_conn->id();
    }
    throw new Exception("Subscription Exists");
}


/**  update subscription info
 * @param $subscription
 * @return int|mixed|"ID of Mod record"
 */
function modSubscription($subscription)
{
    $data_conn = connection();
//    echo "Hello!";
//    echo $subscription['Website_ID'];
    $data_conn->update("Client_Website", [
        "Site_Name" => $subscription['Site_Name'],
        "Description" => $subscription['Description'],
        "Domain" => $subscription['Domain'],
        "GoLive_Date" => $subscription['GoLive_Date'],
        "Project_Cost_Billed" => $subscription['Project_Cost_Billed'],
        "Project_Start" => $subscription['Project_Start'],
        "Hours_Tracked" => $subscription['Hours_Tracked'],
        "Hours_Planned" => $subscription['Hours_Planned'],
        "Type" => $subscription['Type'],
        "Pay" => $subscription['Pay'],
        "Host_Location" => $subscription['Host_Location'],
        "Annual_Renewal" => $subscription['Annual_Renewal'],
        "Notes" => $subscription['Notes']
    ], [
        "Website_ID" => $subscription['Website_ID']
    ]);

    return $data_conn->id();
}

function setInvoice($website_ID, $due_date)
{
    $data_conn = connection();
	$next_year = date('Y-m-d H:i:s', strtotime("1 year", strtotime($due_date)));

    $data_conn->update("Client_Website", [
        "Pay" => "1",
        "Annual_Renewal" => $next_year
    ], [
        "Website_ID" => $website_ID
    ]);
}

function resetInvoice($website_ID, $due_date)
{
    $data_conn = connection();
	$reset_year = date('Y-m-d H:i:s', strtotime("-1 year", strtotime($due_date)));

    $data_conn->update("Client_Website", [
        "Pay" => "0",
        "Annual_Renewal" => $reset_year
    ], [
        "Website_ID" => $website_ID
    ]);
}

/** archive subscription info
 */
if (isset($_POST["action"]) && $_POST["action"] == "archive_subscription") {
    $data_conn = connection();
    $website_ID = $_POST["ID"];

    $data_conn->update("Client_Website", [
        "Status" => "0"
    ], [
        "Website_ID" => $website_ID
    ]);
}

// Set Project to Complete or Incomplete
if (isset($_POST["action"]) && $_POST["action"] == "set-invoice") {
    $data_conn = connection();
    $website_ID = $_POST["ID"];
    $due_date = date($_POST["Invoice"]);

    setInvoice($website_ID, $due_date);
}

if (isset($_POST["action"]) && $_POST["action"] == "reset-invoice") {
    $data_conn = connection();
    $website_ID = $_POST["ID"];
    $due_date = date($_POST["Invoice"]);

    resetInvoice($website_ID, $due_date);
}