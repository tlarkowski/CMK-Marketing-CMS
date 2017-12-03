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
    $temp = search_duplicate_project($project['Company_ID'], $project['ProjectName']);

    if (count($temp) == 0) {
        $data_conn->insert("Client_Project", [
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
        "Project_ID" => $project['Project_ID']
    ]);

    return $data_conn->id();
}

function setComplete($project_ID, $due_date)
{
    $data_conn = connection();
    // $due_date->add(new DateInterval('P1Y'));

    $data_conn->update("Client_Project", [
        "Complete" => "1",
        "End_Date" => $due_date
    ], [
        "Project_ID" => $project_ID
    ]);
}

function setIncomplete($project_ID, $due_date)
{
    $data_conn = connection();
    // $due_date->sub(new DateInterval('P1Y'));

    $data_conn->update("Client_Project", [
        "Complete" => "0",
        "End_Date" => $due_date
    ], [
        "Project_ID" => $project_ID
    ]);
}

/** archive project info
 */
if (isset($_POST["action"]) && $_POST["action"] == "archive_project") {
    $data_conn = connection();
    $project_ID = $_POST["ID"];

    $data_conn->update("Client_Project", [
        "Status" => "0"
    ], [
        "Project_ID" => $project_ID
    ]);
}

// Set Project to Complete or Incomplete
if (isset($_POST["action"]) && $_POST["action"] == "set-complete") {
    $data_conn = connection();
    $project_ID = $_POST["ID"];
    $due_date = new DateTime($_POST["Due"]);

    setComplete($project_ID, $due_date);
}

if (isset($_POST["action"]) && $_POST["action"] == "set-incomplete") {
    $data_conn = connection();
    $project_ID = $_POST["ID"];
    $due_date = new DateTime($_POST["Due"]);

    setIncomplete($project_ID, $due_date);
}