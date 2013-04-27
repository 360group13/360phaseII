
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
		addCustomerTable( parameters[0], parameters[1], parameters[2], parameters[3], parameters[4], parameters[5], "customerTableElement", type);
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
function ViewAllBooks() {
		$.getJSON(
		"/php/ViewAllBooks.php", // The server URL
		{},
		makeBookTable
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


/*end of actual dbfunctions*/

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