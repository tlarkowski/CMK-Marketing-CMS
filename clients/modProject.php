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
    $temp = search_company($company['Companyname']);

    if (count($temp) == 0) {
        $data_conn->insert("Client_Company", [
            "Companyname" => $company['Companyname'],
            "Status" => "1",
            "Contactname" => $company['Contactname'],
            "Description" => $company['Description'],
            "Phone" => $company['Phone'],
            "Reg_Date" => date('Y-m-d H:i:s'),
            "Email" => $company['Email'],
            "Image_URL" => $company['Image_URL']
        ]);
        return $data_conn->id();
    }
    throw new Exception("Company Exist");
}


/**  update project info
 * @param $project
 * @return int|mixed|"ID of Mod record"
 */
function modProject($project)
{
    $data_conn = connection();
    $data_conn->update("Client_Company", [
        "Companyname" => $company['Companyname'],
        "Status" => "1",
        "Contactname" => $company['Contactname'],
        "Description" => $company['Description'],
        "Phone" => $company['Phone'],
        "Email" => $company['Email'],
        "Image_URL" => $company['Image_URL']
    ], [
        "Company_ID" => $company['Company_ID']
    ]);

    return $data_conn->id();
}

/** archive project info
 * @param $project
 * @return int|mixed|"ID of Archived record"
 */
function archiveProject($project)
{
    $data_conn = connection();
    $data_conn->update("Client_Project", [
        "Status" => "1"
    ], [
        "Project_ID" => $company['Project_ID']
    ]);

    return $data_conn->id();
}