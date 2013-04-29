<?php
 require_once 'classes/User.class.php';  
    require_once 'classes/InfoController.class.php';  
    require_once 'classes/dbconnect.class.php';
    require_once 'includes/global.inc.php';
    
    $infoController = new InfoController();
    
    if(isset($_SESSION['logged_in']))
    {
        $user = unserialize($_SESSION['user']);
        $username = $user->username;
        $info = $infoController->getInfo($username);
        $firstName = $info["firstName"];
    }
    
    if(!isset($_SESSION['logged_in'])) {
        $infoController->logout();
        header("refresh:0; UI.php");
    }
    else
    {
        $type = $user->userType;
    }
?>
<!DOCTYPE HTML>
<head>    
    <!-- Jquery 2.0.0 -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    <link  href="/360phaseII/360phaseIII/css/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link  href="/360phaseII/360phaseIII/css/jquery.ui.theme.css" rel="stylesheet" type="text/css" />
    
    <!-- Bootstrap Stuff -->
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">
    <script src = "/360phaseII/360phaseIII/js/bootstrap.js"/></script>

    <!-- Default css look-->
    <link rel="stylesheet" href="/360phaseII/360phaseIII/css/default.css" />	
    <!-- table maker -->
    <script src = "/360phaseII/360phaseIII/js/TableMaker.js"/></script>
    <!-- UI function file -->
    <script src = "/360phaseII/360phaseIII/js/ui.js"/></script>
    <!-- DB functions -->
    <script src = "/360phaseII/360phaseIII/js/dbfunctions.js"/></script>

    <script>
	var firstName = "<?= $firstName ?>";
        var username = "<?= $username ?>";
	var type = "<?= $type ?>";
	$(document).ready(function() {

            $("#logout").parent().prepend("Hello, " + type + " " + firstName + "   ");

            if (type === "Doctor" || type === "Nurse"){
                    $("#myRecordsTab").hide();
                    $("#patientSchedule").hide();
                    viewPatients(username);
            }

            if (type === "Patient"){
                    $("#patientsTab").hide();
                    $("#employeeSchedule").hide();
                    viewOwnMetrics(username);
            }
            viewMyInfo(username);
	});
    </script>
</head>
<body>
<div class = "containerBackground">
	<div class = "container" >
		<div class="row">
			<div class="span12">
                                <div style = "float: right;">
                                    <button type="button" class = "btn btn-inverse" id = "logout" onclick="window.location.href='logout.php'">Logout</button>
                                </div>
				<div class = "page-header">
                                    <h1>Well Check Clinic</h1>
				</div>
                            
				<div class="tabbable">
					<!-- Das Tabs -->
					<ul class="nav nav-tabs" id="myTab">
					  <li><a href="#Books" data-toggle="tab" id = "patientsTab"><i class="icon-user"></i>Patients</a></li>
                                          <li><a href="#myRecords" data-toggle="tab" id = "myRecordsTab"><i class="icon-book"></i>My Records</a></li>
					  <li><a href="#Customers" data-toggle="tab" id = "customerTab"><i class="icon-book"></i>Schedule</a></li>
                                          <li class="active"><a href="#myAccount" data-toggle="tab" id = "myAccountTab"><i class="icon-folder-open"></i>MyAccount</a></li>                                          
					</ul>
					<div class="tab-content">
						<!-- Patients -->
						<div class="tab-pane" id="Books">
                                                    <div class="container-fluid">
                                                        <div class="row-fluid">

                                                            <div class="span2">
                                                                <!--Sidebar content-->
                                                                
                                                                <div>
                                                                    <button type="button" class = "btn btn-inverse btn-block" id = "newPatientButton">New Patient</button>
                                                                </div>
                                                                <table id = "dataTablePatients" class = "table table-hover table-bordered" style = "float: left;">
                                                                        <!-- Used as the header for each category -->
                                                                        <!-- The table is accessed through its ID and tableMaker.js is used to add the cells -->
                                                                        <thead>
                                                                                <tr>
                                                                                        <th><strong>Select a patient:</strong></th>
                                                                                </tr>
                                                                        </thead>
                                                                        <tbody id = "tableBodyPatients">
                                                                        </tbody>
                                                                        <!-- Could be used for pagination or anything else like a refresh button -->
                                                                        <tfoot id = "tableFootCustomer">
                                                                        </tfoot>
                                                                </table>
                                                            </div>

                                                            <div class="span10">
                                                                <!--Body content-->                                                                
                                                                <div class="tabbable">
                                                                    <!--Tab Definition-->
                                                                    <ul id="patientTabs" class="nav nav-tabs">
                                                                        <li class="active"><a href="#patientInfo" data-toggle="tab">Patient Info</a></li>
                                                                        <li><a href="#patientMetrics" data-toggle="tab">Metrics</a></li>
                                                                    </ul>
                                                                    
                                                                    <div class="tab-content">
                                                                        <!--Patient Information tab-->
                                                                        <div class="tab-pane active" id="patientInfo">
                                                                            <div style = "float: right;">
                                                                                    <button type="button" class = "btn btn-inverse" id = "editPatientAccount">Edit Patient</button>
                                                                            </div>
                                                                            <div class=", row-fluid">
                                                                                <div class="text-right, span2"><strong>First Name:</strong></div>
                                                                                <div class="text-left, span2" id="patientInfoFName"></div>
                                                                                <div class="text-right, span2"><strong>Last Name:</strong></div>
                                                                                <div class="text-left, span2" id="patientInfoLName"></div>
                                                                            </div>
                                                                            
                                                                            <div class=", row-fluid">
                                                                                <div class="text-right, span2"><strong>Gender:</strong></div>
                                                                                <div class="text-left, span2" id="patientInfoGender"></div>
                                                                                <div class="text-right, span2"><strong>Date of Birth:</strong></div>
                                                                                <div class="text-left, span2" id="patientInfoDOB"></div>
                                                                            </div>
                                                                            
                                                                            <div class=", row-fluid">
                                                                                <div class="text-right, span1"><strong>Address:</strong></div>
                                                                                <div class="text-left, span2" id="patientInfoAddress"></div>
                                                                                <div class="text-right, span1"><strong>City:</strong></div>
                                                                                <div class="text-left, span1" id="patientInfoCity"></div>
                                                                                <div class="text-right, span1"><strong>State:</strong></div>
                                                                                <div class="text-left, span1" id="patientInfoState"></div>
                                                                                <div class="text-right, span1"><strong>Zip:</strong></div>
                                                                                <div class="text-left, span1" id="patientInfoZip"></div>
                                                                            </div>
                                                                            
                                                                            <div class=", row-fluid">
                                                                                <div class="text-right, span2"><strong>Phone Number:</strong></div>
                                                                                <div class="text-left, span2" id="patientInfoPhNum"></div>                                                                                
                                                                            </div>
                                                                            
                                                                            <div class=", row-fluid">
                                                                                <div class="text-right, span2"><strong>Insurance Company:</strong></div>
                                                                                <div class="text-left, span2" id="patientInfoInsComp"></div>
                                                                                <div class="text-right, span2"><strong>Insurance ID:</strong></div>
                                                                                <div class="text-left, span2" id="patientInfoInsID"></div>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        <!--Patient Metrics tab-->
                                                                        <div class="tab-pane" id="patientMetrics">
                                                                            <div style = "float: right;">
                                                                                <button type="button" class = "btn btn-inverse" id = "newEmployeeMetrics">New Metrics</button>
                                                                            </div>
                                                                            <table class = "table table-bordered table-striped table-hover ">
                                                                                <thead>
                                                                                    <tr>
                                                                                            <td><strong>Input Date</strong></td>
                                                                                            <td><strong>Weight</strong></td>
                                                                                            <td><strong>Sugar Level</strong></td>
                                                                                            <td><strong>Blood Pressure</strong></td>
                                                                                            <td><strong>Prescription</strong></td>
                                                                                            <td><strong>Observation</strong></td>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id = "tableBodyDoctorMetrics">
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
                                                <!-- My Records -->
						<div class="tab-pane" id="myRecords">
							<div class = "container">
                                                            <div class = "span11">
                                                                <div style = "float: center;">
                                                                    <button type="button" class = "btn btn-inverse" id = "newPatientMetrics">New Metrics</button>
                                                                </div>
								<table id = "dataTablePatientMetrics" class = "table table-striped table-bordered table-hover ">
                                                                    <strong>
                                                                    <thead>
                                                                        <tr>
                                                                                <td><strong>Input Date</strong></td>
                                                                                <td><strong>Weight</strong></td>
                                                                                <td><strong>Sugar Level</strong></td>
                                                                                <td><strong>Blood Pressure</strong></td>
                                                                                <td><strong>Prescription</strong></td>
                                                                                <td><strong>Observation</strong></td>
                                                                        </tr>
                                                                    </thead>
                                                                    </strong>
                                                                    <tbody id = "tableBodyPatientMetrics">
                                                                    </tbody>
                                                                    <!-- Could be used for pagination or anything else like a refresh button -->
                                                                    <tfoot id = "tableFootCustomer">
                                                                    </tfoot>
                                                                </table>
                                                            </div>                                                            
							</div>
						</div>
						<!-- Schedule -->
						<div class="tab-pane" id="Customers">
							<div class = "container" id="employeeSchedule">
                                                            <div class = "span11">
								<table id = "dataTableEmployeeSchedule" class = "table table-striped table-hover ">
                                                                    <thead>
                                                                        <tr>
                                                                            <td><strong>Scheduled Date</strong></td>
                                                                            <td><strong>Time</strong></td>
                                                                            <td><strong>Patient</strong></td>
                                                                            <td><strong>Phone Number</strong></td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id = "tableBodyPatientMetrics">
                                                                    </tbody>
                                                                    <!-- Could be used for pagination or anything else like a refresh button -->
                                                                    <tfoot id = "tableFootCustomer">
                                                                    </tfoot>
                                                                </table>
                                                            </div>                                                            
							</div>
                                                        <div class = "container" id="patientSchedule">
                                                            <div class = "span11">
								<table id = "dataTablePatientSchedule" class = "table table-striped table-hover ">
                                                                    <thead>
                                                                        <tr>
                                                                                <td><strong>Scheduled Date</strong></td>
                                                                                <td><strong>Time</strong></td>
                                                                                <td><strong>Doctor</strong></td>
                                                                                <td><strong>Nurse</strong></td>
                                                                                <td><strong>Office Phone</strong></td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id = "tableBodyPatientMetrics">
                                                                    </tbody>
                                                                    <!-- Could be used for pagination or anything else like a refresh button -->
                                                                    <tfoot id = "tableFootCustomer">
                                                                    </tfoot>
                                                                </table>
                                                            </div>                                                            
							</div>
						</div>
                                                <!-- MyAccount -->
						<div class="tab-pane active" id="myAccount">
							<div class = "container" id="myAccountInfo">
                                                            <div class=", row-fluid">
                                                                <div class="text-right, span2"><strong>First Name:</strong></div>
                                                                <div class="text-left, span2" id="myInfoFName"></div>
                                                                <div class="text-right, span2"><strong>Last Name:</strong></div>
                                                                <div class="text-left, span2" id="myInfoLName"></div>
                                                            </div>

                                                            <div class=", row-fluid">
                                                                <div class="text-right, span2"><strong>Gender:</strong></div>
                                                                <div class="text-left, span2" id="myInfoGender"></div>
                                                                <div class="text-right, span2"><strong>Date of Birth:</strong></div>
                                                                <div class="text-left, span2" id="myInfoDOB"></div>
                                                            </div>

                                                            <div class=", row-fluid">
                                                                <div class="text-right, span1"><strong>Address:</strong></div>
                                                                <div class="text-left, span2" id="myInfoAddress"></div>
                                                                <div class="text-right, span1"><strong>City:</strong></div>
                                                                <div class="text-left, span1" id="myInfoCity"></div>
                                                                <div class="text-right, span1"><strong>State:</strong></div>
                                                                <div class="text-left, span1" id="myInfoState"></div>
                                                                <div class="text-right, span1"><strong>Zip:</strong></div>
                                                                <div class="text-left, span1" id="myInfoZip"></div>
                                                            </div>

                                                            <div class=", row-fluid">
                                                                <div class="text-right, span2"><strong>Phone Number:</strong></div>
                                                                <div class="text-left, span2" id="myInfoPhNum"></div>                                                                                
                                                            </div>                                                        
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ADD Patient -->
<div id="patientForm" title="ADD A PATIENT">
	<form>
		<fieldset>
                    <label for="event">Username:</label>
                    <input type="text" name="patientFormUserName" id="patientFormUserName" style="width: 400px; height: 30px; margin-top:10;"/>
                    <label for="event">Password:</label>
                    <input type="password" name="patientFormPassword" id="patientFormPassword" style="width: 400px; height: 30px; margin-top:10;"/>
                    <label for="event">First Name:</label>
                    <input type="text" name="patientFormFirstName" id="patientFormFirstName" style="width: 400px; height: 30px; margin-top:10;"/>
                    <label for="event">Last Name:</label>
                    <input type="text" name="patientFormLasttName" id="patientFormLastName" style="width: 400px; height: 30px; margin-top:10;"/>
                    <label for="event">Address:</label>
                    <input type="text" name="patientFormAddress" id="patientFormAddress" style="width: 400px; height: 30px; margin-top:10;"/>
                    <label for="event">City:</label>
                    <input type="text" name="patientFormCity" id="patientFormCity" style="width: 400px; height: 30px; margin-top:10;"/>
                    <label for="event">State:</label>
                    <input type="text" name="patientFormState" id="patientFormState" style="width: 400px; height: 30px; margin-top:10;"/>
                    <label for="event">Zip:</label>
                    <input type="text" name="patientFormZip" id="patientFormZip" style="width: 400px; height: 30px; margin-top:10;"/>
                    <label for="event">Insured?</label>
                    <input type="checkbox" name="patientFormInsured" id="patientFormInsured" style="margin-top:10;"/>
                    <label for="event">Insurance Company:</label>
                    <input type="text" name="patientFormInsComp" id="patientFormInsComp" style="width: 400px; height: 30px; margin-top:10;"/>
                    <label for="event">Insurance ID:</label>
                    <input type="text" name="patientFormInsID" id="patientFormInsID" style="width: 400px; height: 30px; margin-top:10;"/>
                    <label for="event">Insurance Phone Number:</label>
                    <input type="text" name="patientFormInsPh" id="patientFormInsPh" style="width: 400px; height: 30px; margin-top:10;"/>    
                    <label for="event">Doctor ID:</label>
                    <input type="text" name="patientFormDocID" id="patientFormDocID" style="width: 400px; height: 30px; margin-top:10;"/>    
                    <label for="User">Nurse ID:</label>
                    <input type="text" name="patientFormNurseID" id="patientFormNurseID" value="" class="text ui-widget-content ui-corner-all" style="width: 400px; height: 30px; margin-top:15px;"/>
		</fieldset>
	</form>
</div>

<!-- ADD Metrics -->
<div id="metricsForm" title="ADD METRICS">
	<form>
		<fieldset>
                    <label for="event">Weight:</label>
                    <input type="text" name="metricsFormWeight" id="metricsFormWeight" style="width: 400px; height: 30px; margin-top:10;"/>
                    <label for="event">Blood Pressure:</label>
                    <input type="password" name="metricsFormBp" id="metricsFormBp" style="width: 400px; height: 30px; margin-top:10;"/>  
                    <label for="User">Sugar Level:</label>
                    <input type="text" name="metricsFormSl" id="metricsFormSl" value="" class="text ui-widget-content ui-corner-all" style="width: 400px; height: 30px; margin-top:15px;"/>
		</fieldset>
	</form>
</div>

</body>
</html>