
require_once __DIR__ . "/../accounts/auth.php";
require_once __DIR__ . "/email.php";
require_once __DIR__ . "/../clients/searchUser.php";
require_once __DIR__ . "/../clients/searchCompany.php";
require_once __DIR__ . "/../clients/searchSubscription.php";
require_once __DIR__ . "/../clients/searchProject.php";

date_default_timezone_set("EST");


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
session_start();
$user = $_SESSION['email'];


$one_week_clients = $data['one'];
$two_weeks_client = $data['two'];
$one_week_subscriptions = $data['one_sub'];
$two_weeks_subscriptions = $data['two_sub'];

$one_week_projects = $data['one_pro'];
$two_weeks_projects = $data['two_pro'];

$all_user = all_users();

foreach ($all_user as $user) {
    $_SESSION['email'] = $user;
    ob_start();
    include($_SERVER["DOCUMENT_ROOT"] . "/reminder/email-html.php");

//    $content = getfilec($_SERVER["DOCUMENT_ROOT"] . "/reminder/email-html.php", $data);
    $echoed_content = ob_get_clean(); // gets content, discards buffer
    sendMail($echoed_content, $user);
    echo $echoed_content;
}


