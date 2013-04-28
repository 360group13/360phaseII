var creation;

$(function() {
	// used to initialize dialog menus
	$( "#dialog:ui-dialog" ).dialog( "destroy" );
	
	/*
	* EVENT HANDLERS FOR ICONS
	*/

	// delete icon book
	$("body").on("click", ".removeBook", function(){
      var bookName = $(this).parent().parent().find(":nth-child(1)").text();
      var x=confirm("Do you really want to delete " + bookName + "?");
      if (x === true)
      DeleteBook(bookName);
    });

	//delete icon customer
    $("body").on("click", ".removeCustomer", function(){
      var customerName = $(this).parent().parent().find(":nth-child(1)").text();
      var x=confirm("Do you really want to delete " + customerName + "?");
      if (x === true)
      DeleteCustomer(customerName);
    });
	
	//checkout icon book
	$("body").on("click", ".checkoutBook", function(){
		var bookName = $(this).parent().parent().find(":nth-child(1)").text();
		var x=confirm("Are you sure you want to perform this action " + bookName + "?");
		if (x === true)
		CheckoutBook(bookName);
    });
	
	//comment book
	$("body").on("click", ".commentBook", function(){
		BookDetails($(this).parent().find(":nth-child(1)").text());
		$( "#bookDetailsForm" ).dialog( "open" );
    });
	
	//comment customer
	$("body").on("click", ".commentCustomer", function(){
		var customerID = $(this).parent().find(":nth-child(1)").text();
		CustomerDetails(customerID);
		$( "#customerDetailsForm" ).dialog( "open" );
    });

	/*
	* ALL BUTTON SELECTORS. USE FOR FUNCTIONS
	*/

	// cleans and shows table for customers
	$("#customerTab").click( function() {
		$("#tableBodyCustomer > *").remove();
		ViewAllCustomers();
	});

	//search button for book
	$("#bookSearchButton").click( function() {
		$("#tableBodyBook > *").remove();
		SearchBook($("#bookSearch").val());
	});

	// search button for customer
	$("#customerSearchButton").click( function() {
		$("#tableBodyCustomer > *").remove();
		SearchCustomer($("#customerSearch").val());
	});	

	$('#viewAllBooks').click( function() {
		$("#tableBodyBook > *").remove();
		ViewAllBooks();
	});

	$('#viewAllCustomers').click( function() {
		$("#tableBodyCustomer > *").remove();
		ViewAllCustomers();
	});

	/*
	*  START OF FORMS
	*/

	//variables for the create a job form fields

	var bookName = $( "#bookName" ),
	author = $( "#author" ),
	bookPublication = $( "#bookPublication" ),
	bookDetails = $( "#bookDetails"),
	ISBN = $( "#ISBN" ),
	allFields = $( [] ).add( bookName ).add( author ).add( bookPublication ).add( bookDetails ).add( ISBN ),
	tips = $( ".validateTips" );

	function updateTips( t ) {
		tips
			.text( t )
			.addClass( "ui-state-highlight" );
		setTimeout(function() {
			tips.removeClass( "ui-state-highlight", 1500 );
		}, 500 );
	}
	//verifies that field has correct length
	function checkLength( o, n, min, max ) {
		if ( o.length > max || o.length < min ) {
			( o ).addClass( "ui-state-error" );
			updateTips( "Length of " + n + " must be between " +
				min + " and " + max + "." );
			return false;
		} else {
			return true;
		}
	}

	//checks the fields to make sure they are inputing correctly
	function checkRegexp( o, regexp, n ) {
		if ( !( regexp.test( o ) ) ) {
			( o ).addClass( "ui-state-error" );
			updateTips( n );
			return false;
		} else {
			return true;
		}
	}
	
	//Form to create a job
	$('#patientForm').dialog({
		autoOpen: false,
		height: 650,
		width: 500,
		modal: true,
		draggable: true,
		resizeable: false,
		buttons:	{
			"Add Patient": function() {
				var bValid = true;
				allFields.removeClass( "ui-state-error" );
				// bValid = bValid && checkLength( $("ISBN").val(), "ISBN", 1, 15 );
				// bValid = bValid && checkRegexp( Event.val(), /^[a-z]([0-9a-z_\s])+$/i, "Event name may consist of a-z, 0-9, underscores, begin with a letter." );		
				// Steptoe: Testing sqlstuff
				creation = "firstName="+firstName.val()+"&author="+author.val()+"&published="+bookPublication.val()+"&book_details="+bookDetails.val()+"&isbn="+ISBN.val();
				AddBook(creation);
				if ( bValid ) {
				$( this ).dialog( "close" );
				}
			},
			Cancel: function() {
				$( this ).dialog( "close" );
				}
			},
			Close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
				}
	});
	
	$('#metricsForm').dialog({
		autoOpen: false,
		height: 650,
		width: 500,
		modal: true,
		draggable: true,
		resizeable: false,
		buttons:	{
			"Add Metrics": function() {
				var bValid = true;
				allFields.removeClass( "ui-state-error" );
				// bValid = bValid && checkLength( $("ISBN").val(), "ISBN", 1, 15 );
				// bValid = bValid && checkRegexp( Event.val(), /^[a-z]([0-9a-z_\s])+$/i, "Event name may consist of a-z, 0-9, underscores, begin with a letter." );		
				// Steptoe: Testing sqlstuff
				creation = "firstName="+firstName.val()+"&author="+author.val()+"&published="+bookPublication.val()+"&book_details="+bookDetails.val()+"&isbn="+ISBN.val();
				AddBook(creation);
				if ( bValid ) {
				$( this ).dialog( "close" );
				}
			},
			Cancel: function() {
				$( this ).dialog( "close" );
				}
			},
			Close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
				}
	});
	
	/*
	*  JQUERY FORM SELECTORS
	*/
	$( "#editPatientAccount" ).click(function() {
		$( "#patientForm" ).dialog( "open" );
		return false;
	});

	$( "#newPatient" ).click(function() {
		$( "#patientForm" ).dialog( "open" );
		return false;
	});	
	
	$( "#newPatientMetrics" ).click(function() {
		$( "#metricsForm" ).dialog( "open" );
		return false;
	});	
	
	$( "#newEmployeeMetrics" ).click(function() {
		$( "#metricsForm" ).dialog( "open" );
		return false;
	});	
});

