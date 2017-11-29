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
		data: {"action": "archive", "ID": company_ID}
	});
}

function archiveSubscription(subscription_ID) {
	$.ajax({
		type: "POST",
		url: "/clients/modSubscription.php",
		data: {"action": "archive", "ID": subscription_ID}
	});
}

function archiveProject(project_ID) {
	$.ajax({
		type: "POST",
		url: "/clients/modProject.php",
		data: {"action": "archive", "ID": project_ID}
	});
}