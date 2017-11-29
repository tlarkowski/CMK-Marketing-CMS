<?php
/**
 * Created by PhpStorm.
 * User: chin39
 * Date: 2017/11/11
 * Time: 15:59
 * @param $project
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
    $temp = search_project($project['projectname']);

    if (count($temp) == 0) {
        $data_conn->insert("Client_Project", [
          "Company_ID" => $project["Company_ID"],
          "ProjectName" => $project['ProjectName'],
          "Basecamp_URL" => $project['Basecamp_URL'],
          "Start_Date" => $project['Start_Date'],
          "End_Date" => $project['End_Date'],
          "Description" => $project['Description'],
          "Notes" => $project['Notes'],
          "Status" => "1"
        ]);
        return $data_conn->id();
    }
    throw new Exception("project Exist");
}


/**  update project info
 * @param $project
 * @return int|mixed|"ID of Mod record"
 */
function modProject($project)
{
    $data_conn = connection();
    $data_conn->update("Client_Project", [
        "Company_ID" => $project["Company_ID"],
        "ProjectName" => $project['ProjectName'],
        "Basecamp_URL" => $project['Basecamp_URL'],
        "Start_Date" => $project['Start_Date'],
        "End_Date" => $project['End_Date'],
        "Description" => $project['Description'],
        "Notes" => $project['Notes'],
        "Status" => "1"
    ], [
        "project_ID" => $project['project_ID']
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
    //     "Project_ID" => $project['Project_ID']
    // ]);

    // return $data_conn->id();
}
