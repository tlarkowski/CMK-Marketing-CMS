<?php
date_default_timezone_set("EST");


require_once $_SERVER["DOCUMENT_ROOT"] . "/accounts/auth.php";

require_once __DIR__ . "/email.php";
require_once __DIR__ . "/../clients/searchUser.php";
require_once __DIR__ . "/../clients/searchCompany.php";
require_once __DIR__ . "/../clients/searchSubscription.php";
require_once __DIR__ . "/../clients/searchProject.php";


function findClientsDueDay()
{
    $data_conn = connection();
    $today = date("Y-m-d H:i:s");
    $one_weeks = date("Y-m-d H:i:s", strtotime("+1 Weeks"));
//     = date('Y-m-d H:i:s', strtotime("1 year", strtotime("+1 Weeks")));
    $two_weeks = date("Y-m-d H:i:s", strtotime("+2 Weeks"));

    $all_one_weeks = $data_conn->select("Client_Website", "*", [
        "Pay" => "0",
        "Status" => "1",
        "Annual_Renewal[<>]" => [$today, $one_weeks]
    ]);

    $all_one_weeks_projects = $data_conn->select("Client_Project", "*", [
        "Status" => "1",
        "End_Date[<>]" => [$today, $one_weeks]
    ]);


    $all_two_weeks = $data_conn->select("Client_Website", "*", [
        "Pay" => "0",
        "Status" => "1",
        "Annual_Renewal[<>]" => [$one_weeks, $two_weeks]
    ]);

    $all_two_weeks_projects = $data_conn->select("Client_Project", "*", [
        "Status" => "1",
        "End_Date[<>]" => [$one_weeks, $two_weeks]
    ]);


    $one_week_clients = [];
    $one_week_subscriptions = [];
    $one_week_projects = [];
    foreach ($all_one_weeks as $subscription) {
        $client = all_subscription_client_info($subscription)[0];

        if (!in_array($client, $one_week_clients)) {
            array_push($one_week_clients, $client);
        }

        if (!array_key_exists($client['Company_ID'], $one_week_subscriptions)) {
            $one_week_subscriptions = [
                $client['Company_ID'] => [$subscription],
            ];
        } else {
            array_push($one_week_subscriptions[$client['Company_ID']], $subscription);
        }
    }

    foreach ($all_one_weeks_projects as $project) {
        $client = all_project_client_info($project)[0];

        if (!in_array($client, $one_week_clients)) {
            array_push($one_week_clients, $client);
        }
        if (!array_key_exists($client['Company_ID'], $one_week_projects)) {
            $one_week_projects = [
                $client['Company_ID'] => [$project],
            ];
        } else {
            array_push($one_week_projects[$client['Company_ID']], $project);
        }

    }

    $two_weeks_clients = [];
    $two_weeks_subscriptions = [];
    $two_weeks_projects = [];

    foreach ($all_two_weeks as $subscription) {
        $client = all_subscription_client_info($subscription)[0];

        if (!in_array($client, $two_weeks_clients)) {
            array_push($two_weeks_clients, $client);
        }

        if (!array_key_exists($client['Company_ID'], $two_weeks_subscriptions)) {
            $two_weeks_subscriptions = [
                $client['Company_ID'] => [$subscription],
            ];
        } else {
            array_push($two_weeks_subscriptions[$client['Company_ID']], $subscription);
        }
    }

    foreach ($all_two_weeks_projects as $project) {
        $client = all_project_client_info($project)[0];

        if (!in_array($client, $two_weeks_clients)) {
            array_push($two_weeks_clients, $client);
        }
        if (!array_key_exists($client['Company_ID'], $two_weeks_projects)) {
            $two_weeks_projects = [
                $client['Company_ID'] => [$project],
            ];
        } else {
            array_push($two_weeks_projects[$client['Company_ID']], $project);
        }
    }


    return array("one" => $one_week_clients, "one_sub" => $one_week_subscriptions, "one_pro" => $one_week_projects,
        "two" => $two_weeks_clients, "two_sub" => $two_weeks_subscriptions, "two_pro" => $two_weeks_projects);
}


$data = findClientsDueDay();
$user = $_SESSION['email'];


$one_week_clients = $data['one'];
$two_weeks_client = $data['two'];
$one_week_subscriptions = $data['one_sub'];
$two_weeks_subscriptions = $data['two_sub'];

$one_week_projects = $data['one_pro'];
$two_weeks_projects = $data['two_pro'];

?>

<style>
    body {
        background-color: #00A5C7;
    }
</style>

<!--Section-->
<table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff"
       style="margin:30px auto 40px;display:block;padding:20px;border-radius:10px;-moz-border-radius:10px;-webkit-border-radius:10px;">
    <tr>
        <td valign="top" width="90" align="left" style="border-bottom:8px solid #98BB53;padding-bottom:10px;">
            <img src="http://cmapp.cmkmarketing.com/img/exclamation.png" alt="CMK Marketing" width="auto" height="40"
                 style="margin-left:30px;margin-right:20px;"/>
        </td>
        <td valign="center" width="480" align="center"
            style="border-bottom: 8px solid #98BB53;padding-bottom:10px;padding-right:30px;">
            <p style="color:#333333; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:25px; line-height:25px;margin:0;text-align:center;">
                Your CMS Reminder - Upcoming Due Dates!</p>
        </td>
    </tr>

    <tr>
        <td valign="top" align="left" width="560" style="padding:20px 10px;width:560px;border-bottom:8px solid #98BB53;"
            colspan="2">
            <!-- Intro Text in Table -->
            <p style="color:#333333; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px; line-height:20px;margin:0 0 15px 0;text-align:left;">
                <?php echo "Hi " . $user['LastName'] . ','; ?>
                <br/><br/>
                This is an automated message from your friendly customer management system! It's come to my attention
                that you have a few upcoming invoice/due dates. If any of the following have already been completed,
                head over to <a href="http://cmapp.cmkmarketing.com" style="color: rgb(0, 122, 195);" target="_blank">the
                    application</a> and update the necessary information!
            </p>

            <br/>

            <!-- Due in a Week -->
            <p style="color:#333333; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px; line-height:20px;margin:0 0 15px 0;text-align:left;">
                <strong>Due in the Next Week:</strong></p>
            <ul style="padding-left:30px;margin:0 0 15px 0;">
                <?php
                If (count($one_week_clients) == 0) {
                    echo "None subscriptions";
                }
                foreach ($one_week_clients as $client): ?>
                    <li style="padding-bottom:5px;color:#333333;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px;line-height:20px;text-align:left;">
                        <?php echo $client['Companyname'] ?>
                        <ul style="margin:10px 0 0 0;">

                            <?php
                            if (count($one_week_subscriptions) != 0) {
                                foreach ($one_week_subscriptions[$client['Company_ID']] as $subscription): ?>
                                    <li style="padding-bottom:5px;color:#333333;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px;line-height:20px;text-align:left;">
                                        <strong>Subscription:</strong>
                                        <?php $time = new DateTime($subscription['Annual_Renewal']);
                                        echo $subscription['Site_Name'];
                                        echo '<strong>    Due Date: </strong>' . $time->format('M. d, Y'); ?>
                                    </li>
                                <?php endforeach;
                            } ?>

                            <?php
                            if (count($one_week_projects) != 0) {
                                foreach ($one_week_projects[$client['Company_ID']] as $project): ?>
                                    <li style="padding-bottom:5px;color:#333333;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px;line-height:20px;text-align:left;">
                                        <strong>Project:</strong>
                                        <?php $time = new DateTime($project['End_Date']);
                                        echo $project['ProjectName'];
                                        echo '<strong>    Due Date: </strong>' . $time->format('M. d, Y'); ?>
                                    </li>
                                <?php endforeach;
                            } ?>

                        </ul>
                    </li>
                <?php endforeach; ?>

                <!--                <li style="padding-bottom:5px;color:#333333;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px;line-height:20px;text-align:left;">-->
                <!--                    {Name of Company}-->
                <!--                    <ul style="margin:10px 0 0 0;">-->
                <!--                        <li style="padding-bottom:5px;color:#333333;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px;line-height:20px;text-align:left;">-->
                <!--                            <strong>Subscription:</strong> {Name of Subscription}, {Due Date in 'M. d, Y' format}-->
                <!--                        </li>-->
                <!--                        <li style="padding-bottom:5px;color:#333333;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px;line-height:20px;text-align:left;">-->
                <!--                            <strong>Project:</strong> {Name of Project}, {Due Date in 'M. d, Y' format}-->
                <!--                        </li>-->
                <!--                    </ul>-->
                <!--                </li>-->
            </ul>

            <br/>

            <!-- Due in 2 Weeks -->
            <p style="color:#333333; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px; line-height:20px;margin:0 0 15px 0;text-align:left;">
                <strong>Due in the Next 2 Weeks:</strong></p>
            <ul style="padding-left:30px;margin:0 0 15px 0;">
                <?php
                If (count($two_weeks_client) == 0) {
                    echo "None subscriptions";
                }
                foreach ($two_weeks_client as $client): ?>
                    <li style="padding-bottom:5px;color:#333333;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px;line-height:20px;text-align:left;">
                        <?php echo $client['Companyname'] ?>
                        <ul style="margin:10px 0 0 0;">
                            <?php
                            foreach ($two_weeks_subscriptions[$client['Company_ID']] as $subscription): ?>
                                <li style="padding-bottom:5px;color:#333333;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px;line-height:20px;text-align:left;">
                                    <strong>Subscription:</strong>
                                    <?php $time = new DateTime($subscription['Annual_Renewal']);
                                    echo $subscription['Site_Name'];
                                    echo '<strong>    Due Date: </strong>' . $time->format('M. d, Y'); ?>
                                </li>
                            <?php endforeach; ?>

                            <?php
                            if (count($two_weeks_projects) != 0) {
                                foreach ($two_weeks_projects[$client['Company_ID']] as $project): ?>
                                    <li style="padding-bottom:5px;color:#333333;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px;line-height:20px;text-align:left;">
                                        <strong>Project:</strong>
                                        <?php $time = new DateTime($project['End_Date']);
                                        echo $project['ProjectName'];
                                        echo '<strong>    Due Date: </strong>' . $time->format('M. d, Y'); ?>
                                    </li>
                                <?php endforeach;
                            } ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
                <!--                <li style="padding-bottom:5px;color:#333333;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px;line-height:20px;text-align:left;">-->
                <!--                    {Name of Company}-->
                <!--                    <ul style="margin:10px 0 0 0;">-->
                <!--                        <li style="padding-bottom:5px;color:#333333;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px;line-height:20px;text-align:left;">-->
                <!--                            <strong>Subscription:</strong> {Name of Subscription}, {Due Date in 'M. d, Y' format}-->
                <!--                        </li>-->
                <!--                        <li style="padding-bottom:5px;color:#333333;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px;line-height:20px;text-align:left;">-->
                <!--                            <strong>Project:</strong> {Name of Project}, {Due Date in 'M. d, Y' format}-->
                <!--                        </li>-->
                <!--                    </ul>-->
                <!--                </li>-->
            </ul>

            <br/>

            <!-- Ending Message -->
            <p style="color:#333333; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; line-height:20px;margin:0;text-align:center;">
                <em>You will be sent additional emails on the subscriptions and/or projects listed here as
                    necessary.</em></p>
        </td>
    </tr>
</table>
<!-- End Section-->