function addCustomerTable(customerID, customerName, registrationDate, bookName, purchaseDate, returnDate, classname ) {

	//obtaining parent element
	var ni = document.getElementById("tableBodyCustomer"); //this is what it is http://www.tizag.com/javascriptT/javascript-getelementbyid.php
	
	//create table elements
	var newtr = document.createElement('tr');
	var newtd1 = document.createElement('td');
	var newtd2 = document.createElement('td');
	var newtd3 = document.createElement('td');
	var newtd4 = document.createElement('td');
	var newtd5 = document.createElement('td');
	var newtd6 = document.createElement('td');
	var newtd7 = document.createElement('td');
	
	//set attributes to new element
	newtd1.setAttribute("class", classname);
	newtd2.setAttribute("class", classname + " commentCustomer");
	newtd3.setAttribute("class", classname);
	newtd4.setAttribute("class", classname);
	newtd5.setAttribute("class", classname);
	newtd6.setAttribute("class", classname);
	newtd7.setAttribute("class", classname);
	
	//what is in the container
	newtd1.innerHTML = customerID;
	newtd2.innerHTML = customerName;
	newtd3.innerHTML = registrationDate;
	newtd4.innerHTML = bookName;
	newtd5.innerHTML = purchaseDate;
	newtd6.innerHTML = returnDate;
	newtd7.innerHTML = "<i class=\"icon-remove removeCustomer\"></i>";
	
	//makes it a child of the table div
	newtr.appendChild(newtd1);
	newtr.appendChild(newtd2);
	newtr.appendChild(newtd3);
	newtr.appendChild(newtd4);
	newtr.appendChild(newtd5);
	newtr.appendChild(newtd6);
	newtr.appendChild(newtd7);
	ni.appendChild(newtr);
}

function addBookTable(bookName, author, publication, issueDate, returnDate, customerID, ISBN, classname ,user) {

	//obtaining parent element
	var ni = document.getElementById("tableBodyBook");
	
	//create table elements
	var newtr = document.createElement('tr');
	var newtd1 = document.createElement('td');
	var newtd2 = document.createElement('td');
	var newtd3 = document.createElement('td');
	var newtd4 = document.createElement('td');
	var newtd5 = document.createElement('td');
	var newtd6 = document.createElement('td');
	var newtd7 = document.createElement('td');
	var newtd8 = document.createElement('td');
 
    //Assign different attributes to the element.

	//set attributes to new element
	newtd1.setAttribute("class",classname + " commentBook");
	newtd2.setAttribute("class",classname);
	newtd3.setAttribute("class",classname);
	newtd4.setAttribute("class",classname);
	newtd5.setAttribute("class",classname);
	newtd6.setAttribute("class",classname);
	newtd7.setAttribute("class",classname);
	newtd8.setAttribute("class",classname);
	
	//what is in the container
	newtd1.innerHTML = bookName;
	newtd2.innerHTML = author;
	newtd3.innerHTML = publication;
	newtd4.innerHTML = issueDate;
	newtd5.innerHTML = returnDate;
	newtd6.innerHTML = customerID;
	newtd7.innerHTML = ISBN;
	if (type == "Admin")
	newtd8.innerHTML = "<i class=\"icon-remove removeBook\"></i>";
	else
	newtd8.innerHTML = "<i class=\"icon-shopping-cart checkoutBook\"></i>";
	//makes it a child of the table div
	newtr.appendChild(newtd1);
	newtr.appendChild(newtd2);
	newtr.appendChild(newtd3);
	newtr.appendChild(newtd4);
	newtr.appendChild(newtd5);
	newtr.appendChild(newtd6);
	newtr.appendChild(newtd7);
	newtr.appendChild(newtd8);
	
	ni.appendChild(newtr);
}