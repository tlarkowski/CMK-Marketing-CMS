<?php
/**
 * Created by PhpStorm.
 * User: chin39
 * Date: 2017/11/11
 * Time: 15:59
 * @param $company
 */
date_default_timezone_set("EST");
include_once $_SERVER["DOCUMENT_ROOT"] . "/clients/searchCompany.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/db/conn.php";

/** add new company info
 * @param $company
 * @return int|mixed "Id of add record"|
 * @throws Exception
 */
function addCompany($company)
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
    throw new Exception("Company Exists");
}


/**  update company info
 * @param $company
 * @return int|mixed|"ID of Mod record"
 */
function modCompany($company)
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


/** archive company info and propagate the archive across all of its projects and subscriptions
 * @param $company
 * @return int|mixed|"ID of Archived record"
 */
function archiveCompany($company)
{
    $data_conn = connection();

    $data_conn->update("Client_Company", [
        "Status" => "0"
    ], [
        "Company_ID" => $company['Company_ID']
    ]);
    $data_conn->update("Client_Website", [
        "Status" => "0"
    ], [
        "Company_ID" => $company['Company_ID']
    ]);
    $data_conn->update("Client_Project", [
        "Status" => "0"
    ], [
        "Company_ID" => $company['Company_ID']
    ]);

    return $data_conn->id();
}