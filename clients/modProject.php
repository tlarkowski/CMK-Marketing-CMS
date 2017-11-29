<?php
/**
 * Created by PhpStorm.
 * User: chin39
 * Date: 2017/11/11
 * Time: 15:59
 * @param $company
 */
date_default_timezone_set("EST");
include_once $_SERVER["DOCUMENT_ROOT"] . "/clients/searchProject.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/db/conn.php";

/** add new project info
 * @param $project
 * @return int|mixed "Id of add record"|
 * @throws Exception
 */
function addProject($project)
{
    $data_conn = connection();
    $temp = search_duplicate_project($project['Company_ID'], $project['ProjectName']);

    if (count($temp) == 0) {
        $data_conn->insert("Client_Website", [
            "Company_ID" => $project['Company_ID'],
            "ProjectName" => $project['ProjectName'],
            "Description" => $project['Description'],
            "Status" => "1",
            "Basecamp_URL" => $project['Basecamp_URL'],
            "Start_Date" => $project['Start_Date'],
            "End_Date" => $project['End_Date'],
            "Notes" => $project['Notes']
        ]);
        return $data_conn->id();
    }
    throw new Exception("Project Exists");
}


/**  update project info
 * @param $project
 * @return int|mixed|"ID of Mod record"
 */
function modProject($project)
{
    $data_conn = connection();

    $data_conn->update("Client_Website", [
        "ProjectName" => $subscription['ProjectName'],
        "Description" => $subscription['Description'],
        "Basecamp_URL" => $subscription['Basecamp_URL'],
        "Start_Date" => $subscription['Start_Date'],
        "End_Date" => $subscription['End_Date'],
        "Notes" => $subscription['Notes']
    ], [
        "Website_ID" => $subscription['Website_ID']
    ]);

    return $data_conn->id();
}

/** archive project info
 * @param $project
 * @return int|mixed|"ID of Archived record"
 */
function archiveProject($project)
{
    // $data_conn = connection();
    // $data_conn->update("Client_Project", [
    //     "Status" => "1"
    // ], [
    //     "Project_ID" => $company['Project_ID']
    // ]);

    // return $data_conn->id();
}