<?php
    require_once 'classes/User.class.php';  
    require_once 'classes/InfoController.class.php';  
    require_once 'classes/dbconnect.class.php';
    require_once 'includes/global.inc.php';
    
    if(isset($_SESSION['logged_in']))
        $user = unserialize($_SESSION['user']);
    
    $info = new InfoController();
    
    if(!isset($_SESSION['logged_in']) || ($info->getUsertype($user->username) != 'Doctor')) {
        echo "Please login. You will be redirected to the login page now...";
        $info->logout();
        header("refresh:2; UI.php");
    }
    else
    {
        echo '
            <html>
                <head>
                    <title>Well Check Clinic</title>  
                    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
                    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
                    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
                    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">

                    <script>
                        $(function() {
                          $( "#mainTabs" ).tabs();
                          $( "#patientTabs" ).tabs();
                        });
                    </script>
                </head>

                <body>

                <div class="container">

                <!-------->
                    <div id="mainTabs">
                        <ul id="mainTabsUl" class="nav nav-tabs" data-tabs="tabs">
                            <li class="active"><a href="#viewPatients" data-toggle="tab">Patients</a></li>
                            <li><a href="#viewSchedule" data-toggle="tab">Schedule</a></li>
                        </ul>

                        <div id="main-tab-content" class="tab-content">
                            <div id="viewPatients">
                                <div class="container-fluid">
                                    <div class="row-fluid">

                                        <div class="span2">
                                            <!--Sidebar content-->
                                            <h2>This is the patients section</h2>
                                            <?php
                                            //include_once "classes/InfoController.class.php";
                                                //$info = new InfoController();
                                            ?>
                                        </div>

                                        <div class="span10">
                                            <!--Body content-->
                                            <div id="patientTabs">
                                                <ul id="patientTabsUl" class="nav nav-tabs" data-tabs="tabs">
                                                    <li class="active"><a href="#patientAccount" data-toggle="tab">Account</a></li>
                                                    <li><a href="#patientMetrics" data-toggle="tab">Metrics</a></li>
                                                </ul>

                                                <div id="main-tab-content" class="tab-content">
                                                    <div id="patientAccount">
                                                        <h3>Patient Account info</h3>
                                                    </div>
                                                    <div id="patientMetrics">
                                                        <h3>Patient Metrics</h3>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="viewSchedule">
                                <h1>Orange</h1>
                                <p>orange orange orange orange orange</p>
                            </div>
                            <div class="row offset10">
                                <a href="/360phaseII/360phaseIII/php/logout.php" class="btn btn-primary">Logout</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- container -->

                </body>
            </html>
        ';
    }
?>

<?php
 session_start();
 $type = Guest;
	if($_SESSION['type'] == 1)
		$type = Admin;
	if($_SESSION['type'] == 2)
		$type = Customer;
?>
<!DOCTYPE HTML>
<head>
	<!-- Jquery 1.8.2-->
	<script src="js/jquery-1.8.2.js"></script>
	<!-- Jquery UI 1.9.1 -->
	<script src="js/jquery-ui-1.9.1.js"></script>
	<link  href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
	<link  href="css/jquery.ui.theme.css" rel="stylesheet" type="text/css" />
	<!-- Bootstrap Stuff -->
	<link  href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link  href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
	<script src = "js/bootstrap.js"/></script>
	<!-- Default css look-->
	<link rel="stylesheet" href="css/default.css" />	
	<!-- table maker -->
	<script src = "js/TableMaker.js"/></script>
	<!-- UI function file -->
	<script src = "js/ui.js"/></script>
	<!-- DB functions -->
	<script src = "js/dbfunctions.js"/></script>
	<script>
	var username = "<?= $_SESSION['username'] ?>";
	var type = "<?= $type ?>";
	$(document).ready(function() {

	if (type == "Guest"){
		$("#login").parent().prepend("Hello, " + type);
		$("#logout").hide();
	}
	else
		$("#login").parent().prepend("Hello, " + type + ": " + username + "   ");
	
	if (type == "Guest" || type == "Customer"){
		$("#addBook").hide();
		$(".removeBook").hide();
		$("#customerTab").hide();
		$("#removeLegend").hide();
	}

	if (type == "Admin" || type == "Customer"){
		$("#login").hide();	
	}

	});
	</script>
</head>
<body onload="ViewAllBooks()">
<div class = "containerBackground">
	<div class = "container" >
		<div class="row">
			<div class="span12">
				<div class = "page-header">
				<h1>Library Management System</h1>
				</div>
				<div style = "float: right;">
					<button type="button" class = "btn btn-primary" id = "login" onclick="window.location.href='login.html'" >Login</button>
					<button type="button" class = "btn btm-inverse" id = "logout" onclick="window.location.href='/php/logout.php'">Logout</button>
				</div>
				<div class="tabbable">
					<!-- Das Tabs -->
					<ul class="nav nav-tabs" id="myTab">
					  <li class="active"><a href="#Books" data-toggle="tab"><i class="icon-book"></i>Books</a></li>
					  <li><a href="#Customers" data-toggle="tab" id = "customerTab"><i class="icon-user"></i>Customers</a></li>
					</ul>
					<div class="tab-content">
						<!-- Books -->
						<div class="tab-pane active" id="Books">
							<div class = "row">
								<div class = "span4">
									<!-- Use Jquery Selectors instead of functions -->
									<br>
									<button type="button" class = "btn" id = "addBook">Add Book</button>
									<br><br>
									<button type="button" class = "btn" id = "viewAllBooks">View All Books</button>
									<br><br>
									<input type="text" class = "input-large search-query" id = "bookSearch" value = "search by name/author">
									<button type="button" class = "btn" id="bookSearchButton" >Search</button>
								</div>
								<div class = "span8">
									<div class = "tableContainer">
										<!--table used to hold all database values-->
										<table id = "dataTableCustomer" class = "table table-striped table-hover">
											<thead>
												<tr>
													<td>Book Name</td>
													<td>Author </td>
													<td>Publisher </td>
													<td>Issued</td>
													<td>Returned</td>
													<td>Customer ID</td>
													<td>ISBN</td>
													<td></td>
												</tr>
											</thead>
											<!-- The table is accessed through its ID and tableMaker.js is used to add the cells -->
											<tbody id = "tableBodyBook">
												
											</tbody>
											<!-- Could be used for pagination or anything else like a refresh button -->
											<tfoot id = "tableFootCustomer">
											</tfoot>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- Customers -->
						<div class="tab-pane" id="Customers">
							<div class = "row">
								<div class = "span4">
									<!-- Use Jquery Selectors instead of functions -->
									<br>
									<button type="button" class = "btn" id = "addCustomer">Add Customer</button>
									<br><br>
									<button type="button" class = "btn" id = "viewAllCustomers">View All Customers</button>
									<br><br>
									<input type="text" class = "input-large search-query" id = "customerSearch"  value = "search by name">
									<button type="button" class = "btn" id="customerSearchButton">Search</button>
								</div>
								<div class = "span8">
									<div class = "tableContainer">
										<!--table used to hold all database values-->
										<table id = "dataTableCustomer" class = "table table-striped table-hover ">
											<!-- Used as the header for each category -->
											<!-- The table is accessed through its ID and tableMaker.js is used to add the cells -->
											<thead>
												<tr>
													<td>ID</td>
													<td>Name </td>
													<td>Registation Date </td>
													<td>Book Name</td>
													<td>Purchase Date </td>
													<td>Return Date</td>
													<td></td>
												</tr>
											</thead>
											<tbody id = "tableBodyCustomer">
											</tbody>
											<!-- Could be used for pagination or anything else like a refresh button -->
											<tfoot id = "tableFootCustomer">
											</tfoot>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div style = "float: right;">
				<i class = "icon-shopping-cart"></i>Check-out/Check-in
				<br>
				<span id = "removeLegend">
					<i class = "icon-remove"></i>Remove
				</span>
				<p>*Click on an item to get details</p>
			</div>
		</div>
	</div>
</div>

<!-- ADD BOOK -->
<div id="bookForm" title="ADD A BOOK">
	<p class="validateTips">All form fields are required.</p>
	<form>
		<fieldset>
			<label for="event">Book Name:</label>
			<input type="text" name="bookName" id="bookName" style="width: 400px; height: 30px; margin-top:10;"/>
			<label for="event">Author:</label>
			<input type="text" name="author" id="author" style="width: 400px; height: 30px; margin-top:10;"/>
			<label for="event">Book Publication:</label>
			<input type="text" name="bookPublication" id="bookPublication" style="width: 400px; height: 30px; margin-top:10;"/>
			<label for="event">Book Details:</label>
			<input type="text" name="bookDetails" id="bookDetails" style="width: 400px; height: 30px; margin-top:10;"/>
			<label for="User">ISBN:</label>
			<input type="text" name="ISBN" id="ISBN" value="" class="text ui-widget-content ui-corner-all" style="width: 400px; height: 30px; margin-top:15px;"/>
		</fieldset>
	</form>
</div>

<!-- ADD CUSTOMER -->
<div id="customerForm" title="ADD A CUSTOMER">
	<p class="validateTips">All form fields are required.</p>
	<form>
		<fieldset>
			<label for="event">Customer Name:</label>
			<input type="text" name="customerName" id="customerName" style="width: 400px; height: 30px; margin-top:10;"/>
			<label for="User">Details:</label>
			<input type="text" name="customerDetails" id="customerDetails" value="" class="text ui-widget-content ui-corner-all" style="width: 400px; height: 30px; margin-top:15px;"/>
		</fieldset>
	</form>
</div>

<!-- CUSTOMER DETAILS FORM -->
<div id="customerDetailsForm" title="CUSTOMER DETAILS">
	<!-- filled out dynamically -->
</div>

<!-- BOOK DETAILS FORM -->
<div id="bookDetailsForm" title="BOOK DETAILS">
	<!-- filled out dynamically -->
</div>

</body>
</html>
