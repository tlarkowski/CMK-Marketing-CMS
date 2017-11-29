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
            "Pay" => $subscription['Pay'],
            "Host_Location" => $subscription['Host_Location'],
            "Annual_Renewal" => $subscription['Annual_Renewal'],
            "Notes" => $subscription['Notes']
        ]);
        return $data_conn->id();
    }
    throw new Exception("Subscription Exist");
}


/**  update subscription info
 * @param $subscription
 * @return int|mixed|"ID of Mod record"
 */
function modSubscription($subscription)
{
    $data_conn = connection();
    echo $subscription['Website_ID'];
    $data_conn->update("Client_Website", [
        "Site_Name" => $subscription['Site_Name'],
        "Domain" => $subscription['Domain'],
        "GoLive_Date" => $subscription['GoLive_Date'],
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

/** archive subscription info
 * @param $subscription
 * @return int|mixed|"ID of Archived record"
 */
function archiveSubscription($subscription)
{
    // $data_conn = connection();
    // $data_conn->update("Client_Website", [
    //     "Status" => "1"
    // ], [
    //     "Website_ID" => $subscription['Website_ID']
    // ]);

    // return $data_conn->id();
}