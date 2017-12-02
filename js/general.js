/*
	Application: CMK Marketing Customer Management System
	Module: General Scripting

	Developers: Tusa Larkowski, Adeel Minhas, Ruowen Qin
	Brief Description: Handles any general functions for the entire application.
*/

// Archiving Functions
function archiveClient(company_ID) {
    $.ajax({
        type: "POST",
        url: "/clients/modCompany.php",
        data: {"action": "archive_client", "ID": company_ID},
        success: function () {
            window.location.href = "/";
        }
    });
}

function archiveSubscription(subscription_ID, company_name) {
    $.ajax({
        type: "POST",
        url: "/clients/modSubscription.php",
        data: {"action": "archive_subscription", "ID": subscription_ID},
        success: function () {
            window.location.href = "/pages/client-info.php?client=" + company_name;
        }
    });
}

function archiveProject(project_ID, company_name) {
    $.ajax({
        type: "POST",
        url: "/clients/modProject.php",
        data: {"action": "archive_project", "ID": project_ID},
        success: function () {
            window.location.href = "/pages/client-info.php?client=" + company_name;
        }
    });
}