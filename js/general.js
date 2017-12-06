/*
	Application: CMK Marketing Customer Management System
	Module: General Scripting

	Developers: Tusa Larkowski, Adeel Minhas, Ruowen Qin
	Brief Description: Handles any general functions for the entire application.
*/

// Masking Function for Client Phone Number
jQuery(function($){
   $("#contact-number").mask("(999) 999-9999",{placeholder:""});
});

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

// Setting Project Completion
function setComplete(project_ID, due_date) {
    $.ajax({
        type: "POST",
        url: "/clients/modProject.php",
        data: {"action": "set-complete", "ID": project_ID, "Due": due_date},
        success: function () {
            document.location.reload();
        }
    });
}

function setIncomplete(project_ID, due_date) {
    $.ajax({
        type: "POST",
        url: "/clients/modProject.php",
        data: {"action": "set-incomplete", "ID": project_ID, "Due": due_date},
        success: function () {
            document.location.reload();
        }
    });
}


// Setting Subscription to Paid
function setInvoice(website_ID, due_date) {
    $.ajax({
        type: "POST",
        url: "/clients/modSubscription.php",
        data: {"action": "set-invoice", "ID": website_ID, "Invoice": due_date},
        success: function () {
            document.location.reload();
        }
    });
}

function resetInvoice(website_ID, due_date) {
    $.ajax({
        type: "POST",
        url: "/clients/modSubscription.php",
        data: {"action": "reset-invoice", "ID": website_ID, "Invoice": due_date},
        success: function () {
            document.location.reload();
        }
    });
}