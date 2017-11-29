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
		data: {action: "archive", ID: company_ID},
		success: function(html) {
			alert(html);
		}
	});
}