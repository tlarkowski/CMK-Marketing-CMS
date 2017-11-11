<?php
/**
 * Created by PhpStorm.
 * User: chin39
 * Date: 2017/11/11
 * Time: 15:59
 * @param $company
 */
date_default_timezone_set("EST");

require_once '../db/conn.php';

/** add new company info
 * @param $company
 * @return int|mixed|"Id of add record"|
 */
function addCompany($company)
{
    $data_conn = connection();
    $data_conn->insert("account", [
        "Companyname" => $company['Companyname'],
        "Status" => "1",
        "Contactname" => $company['Contactname'],
        "Description" => $company['Description'],
        "Reg_Date" => date('Y-m-d H:i:s'),
        "Email" => $company['Email'],
        "Image_URL" => $company['Image_URL'],
        "Website" => $company['Website']
    ]);
    return $data_conn->id();
}


/**  update company info
 * @param $company
 * @return int|mixed|"ID of Mod record"
 */
function modCompany($company)
{
    $data_conn = connection();
    $data_conn->update("account", [
        "Companyname" => $company['Companyname'],
        "Status" => "1",
        "Contactname" => $company['Contactname'],
        "Description" => $company['Description'],
        "Reg_Date" => date('Y-m-d H:i:s'),
        "Email" => $company['Email'],
        "Image_URL" => $company['Image_URL'],
        "Website" => $company['Website']
    ], [
        "Company_ID" => $company['Company_ID']
    ]);

    return $data_conn->id();

}