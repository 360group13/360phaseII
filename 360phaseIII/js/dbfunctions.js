
function show(json) {
		alert(json);
	}

function cDetails( json ){
	var parameters = json[0].split("|");
	$("#customerDetailsForm > *").remove();
	$("#customerDetailsForm").html(
		"<div class= \"customerDetailsFormTitle\">Customer ID: " + parameters[0] + "</div>" +
		"<div class= \"customerDetailsFormTitle\">Customer Name: " + parameters[1] + "</div>"+
		"<div class= \"customerDetailsFormTitle\">Registration Date: " + parameters[2] + "</div>"+
		"<div class= \"customerDetailsFormTitle\">Last Book: " + parameters[3] + "</div>"+
		"<div class= \"customerDetailsFormTitle\">Checkout Date: " + parameters[4] + " </div>"+
		"<div class= \"customerDetailsFormTitle\">Returned Date: " + parameters[5] + " </div>"+
		"<div class= \"customerDetailsFormTitle\">Current Book: " + parameters[6] + "</div>"+
		"<div class= \"customerDetailsFormTitle\">Checkout Date: " + parameters[7] + " </div>"+
		"<div class= \"customerDetailsFormTitle\">Return Date: " + parameters[8] + " </div>"+
		"<div class= \"customerDetailsFormTitle\">Books: " + parameters[9] + " </div>");
}

function bDetails( json ){
	var parameters = json[0].split("|");
	$("#bookDetailsForm > *").remove();
	$("#bookDetailsForm").html(
		"<div class= \"bookDetailsFormTitle\">Name " + parameters[0] + "</div>" +
		"<div class= \"bookDetailsFormTitle\">Author: " + parameters[1] + "</div>"+
		"<div class= \"bookDetailsFormTitle\">Publication: " + parameters[2] + "</div>"+
		"<div class= \"bookDetailsFormTitle\">Issued: " + parameters[3] + "</div>"+
		"<div class= \"bookDetailsFormTitle\">Returned: " + parameters[4] + " </div>"+
		"<div class= \"bookDetailsFormTitle\">Customer ID: " + parameters[5] + " </div>"+
		"<div class= \"bookDetailsFormTitle\">ISBN: " + parameters[6] + " </div>"+
		"<div class= \"bookDetailsFormTitle\">Other Details: " + parameters[7] + " </div>");
	}

function makeBookTable( json ){
	for( var i = 0; i < json.length; i++){
		var parameters = json[i].split("|");
		addBookTable( parameters[0], parameters[1], parameters[2], parameters[3], parameters[4], parameters[5], parameters[6], parameters[7], "bookTableElement");
	}
}

function makeCustomerTable( json ){
	for( var i = 0; i < json.length; i++){
		var parameters = json[i].split("|");
		addCustomerTable( parameters[0], parameters[1], parameters[2], parameters[3], parameters[4], parameters[5], "customerTableElement");
	}
}

function nothing(){}
	
function run() {
		$.getJSON(
		"ajax.php", // The server URL
		{ id: 567 }, // Data you want to pass to the server.
		show // The function to call on completion.
		);
	}
function AddBook(creation) {
		$.getJSON(
		"/php/AddBook.php", // The server URL
		{ creation: creation }, // Data you want to pass to the server.
		Click1Delay// The function to call on completion.
		);
	}
function AddCustomer(creation) {
		$.getJSON(
		"/php/AddCustomer.php", // The server URL
		{ creation: creation }, // Data you want to pass to the server.
		Click2Delay // The function to call on completion.
		);
	}
function DeleteBook(bookName) {
		$.getJSON(
		"/php/DeleteBook.php", // The server URL
		{ bookname: bookName }, // Data you want to pass to the server.
		Click1Delay// The function to call on completion.
		);
	}
function DeleteCustomer(customerName) {
		$.getJSON(
		"/php/DeleteCustomer.php", // The server URL
		{ customername: customerName }, // Data you want to pass to the server.
		Click2Delay// The function to call on completion.
		);
	}

function ViewAllCustomers() {
		$.getJSON(
		"/php/ViewAllCustomers.php", // The server URL
		{},
		makeCustomerTable
		);
	}

function CheckoutBook(bookName){
		$.getJSON(
			"/php/CheckoutBook.php",
			{ bookname: bookName },
			CheckOutOps);
}
function SearchBook(searchTextB){
		$.getJSON(
			"/php/SearchBook.php",
			{ searchText: searchTextB },
			makeBookTable);
}
function SearchCustomer(searchTextC){
		$.getJSON(
			"/php/SearchCustomer.php",
			{ searchText: searchTextC },
			makeCustomerTable);
}
function CustomerDetails(name){
		$.getJSON(
			"/php/CustomerDetails.php",
			{ customerID: name },
			cDetails);
}
function BookDetails(name){
		$.getJSON(
			"/php/BookDetails.php",
			{ bookName: name },
			bDetails);
}

//===========================My Functions===============================================
function AddPatient(creation) {
	$.getJSON(
		"/360phaseII/360phaseIII/php/addPatient.php", // The server URL
		{ creation: creation }, // Data you want to pass to the server.
		Click1Delay// The function to call on completion.
	);
}

function makePatientsTable( json ){
        for( var i = 0; i < json.length; i++){
		var parameters = json[i].split("|");
		patientsTable(parameters[0], parameters[1], parameters[2], "patientTableElement");
	}
}

function makePatientMetricsTable( json ) {
    
    var ni = document.getElementById("tableBodyDoctorMetrics");        
    while(ni.hasChildNodes())
    {
       ni.removeChild(ni.firstChild);
    }
    
    for( var i = 0; i < json.length; i++){
		var parameters = json[i].split("|");
		patientsMetricsTable(parameters[0], parameters[1], parameters[2], parameters[3], parameters[4], parameters[5], "patientMetricsTableElement", "tableBodyDoctorMetrics");
	}
}

function makeOwnMetricsTable( json ) {
    var ni = document.getElementById("tableBodyPatientMetrics");        
    while(ni.hasChildNodes())
    {
       ni.removeChild(ni.firstChild);
    }
    
    for( var i = 0; i < json.length; i++){
            var parameters = json[i].split("|");
            patientsMetricsTable(parameters[0], parameters[1], parameters[2], parameters[3], parameters[4], parameters[5], "patientMetricsTableElement", "tableBodyPatientMetrics");
    }
}

function viewMyInfo(username) {
            var json;
                $.getJSON(
			"/360phaseII/360phaseIII/php/viewMyInfo.php", // The server URL
			{username: username},
			function (jsonR) {
                            json = jsonR.split("|");
                            document.getElementById("myInfoFName").innerHTML = json[1];
                            document.getElementById("myInfoLName").innerHTML = json[2];
                            document.getElementById("myInfoGender").innerHTML = json[3];
                            document.getElementById("myInfoDOB").innerHTML = json[4];
                            document.getElementById("myInfoAddress").innerHTML = json[5];
                            document.getElementById("myInfoCity").innerHTML = json[6];
                            document.getElementById("myInfoState").innerHTML = json[7];
                            document.getElementById("myInfoZip").innerHTML = json[8];
                            document.getElementById("myInfoPhNum").innerHTML = json[9];                                
                        }
		);
	}
        
function viewPatientInfo(username) {
            var json;
                $.getJSON(
			"/360phaseII/360phaseIII/php/viewPatientInfo.php", // The server URL
			{username: username},
			function (jsonR) {
                            json = jsonR.split("|");
                            document.getElementById("patientInfoFName").innerHTML = json[1];
                            document.getElementById("patientInfoLName").innerHTML = json[2];
                            document.getElementById("patientInfoGender").innerHTML = json[3];
                            document.getElementById("patientInfoDOB").innerHTML = json[4];
                            document.getElementById("patientInfoAddress").innerHTML = json[5];
                            document.getElementById("patientInfoCity").innerHTML = json[6];
                            document.getElementById("patientInfoState").innerHTML = json[7];
                            document.getElementById("patientInfoZip").innerHTML = json[8];
                            document.getElementById("patientInfoPhNum").innerHTML = json[9];
                            document.getElementById("patientInfoInsComp").innerHTML = json[10];
                            document.getElementById("patientInfoInsID").innerHTML = json[11];         
                        }
		);
	}

function viewPatients(username) {
		$.getJSON(
		"/360phaseII/360phaseIII/php/viewPatients.php", // The server URL
		{username: username},
		makePatientsTable
		);
	}
        
function viewPatientMetrics(username) {
		$.getJSON(
		"/360phaseII/360phaseIII/php/viewMetrics.php", // The server URL
		{username: username},
		makePatientMetricsTable
		);
	}

function viewOwnMetrics(username) {
		$.getJSON(
		"/360phaseII/360phaseIII/php/viewMetrics.php", // The server URL
		{username: username},
		makeOwnMetricsTable
		);
	}

function Click1Delay(){
		setTimeout("$('#viewAllBooks').trigger('click')", 750);
}

function Click2Delay(){
		setTimeout("$('#viewAllCustomers').trigger('click')", 750);
}

function CheckOutOps(json){
		alert(json);
		Click1Delay();
}

/*end of actual dbfunctions*/