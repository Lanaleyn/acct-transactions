<?php
include "includes/dbconfig.php";

$databasecfg = new DBConfig;
extract($_POST);

if (isset($btnSubmit)) {
	$databasecfg->addTrans($txtDate, $txtDesc, $txtIncDec, $txtAmount, $txtBalance);
}

if(isset($btnUpdate)){
	$databasecfg->updateTrans($txtDate, $txtDesc, $txtIncDec, $txtAmount, $txtBalance);
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Accounting System</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="js/jquery-3.5.1.min.js"></script>
		<script src="js/bootstrap/bootstrap.min.js"></script>
	</head>
	<body>

		<div class="container mb-3 mt-3">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div id="formheader"class="card-header">
							--------------------
						</div>
						<div class="card-body">
							<h4 class="card-title">Debit and Credit Transaction</h4>
							<p class="card-text">Please fill up the fields. All are required.</p>

							<form id="submissionform" method="POST">
								<div class="form-row">
									<div class="form-group col-md-3">
										<label for="date">Date</label>
										<input type="date" class="form-control" name="txtDate" placeholder="e.g. DD/MM/YYYY" required>
									</div>
									<div class="form-group col-md-7">
										<label>Description</label>
										<input type="text" class="form-control mr-2" name="txtDesc" placeholder="e.g. Paid Rent, Collection Received, etc." required>
									</div>
								</div>	

								<div class="form-row">
									<div class="form-group col-md-2 ">
										<label>Increase/Decrease</label><br>
										<input type="radio" id="Increase" name="radiobtn" value="Increase">
										<label for="Increase">Increase</label><br>
										<input type="radio" id="Decrease" name="radiobtn" value="Decrease">
										<label for="Decrease">Decrease</label><br>
									</div>
									<div class="form-group col-md-3">
										<label for="date">Amount</label>
										<input type="text" class="form-control" name="txtBAmount" placeholder="e.g. 12345.67" required>
									</div>
									<div class="form-group col-md-5">
										<label>Balance</label>
										<input type="text" class="form-control mr-2" name="txtBalance" placeholder="e.g. 12345.67" required>
									</div>
								</div>


								<div class="form-group">
									<input type="submit" class="btn btn-primary mr-2" name="btnSubmit" value="Submit">
									<input type="reset" class="btn btn-danger" name="btnClear" value="Clear Values">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateUser">Update</button>
								</div>
							</form>
						</div>
					</div>

					<div><br></div> <!-- spacer-->

					<div class="card">
						<div id="records" class="card-header">
							Records Section
						</div>
						<div class="card-body">
							<p class="card-text">
								<?php
									$databasecfg->displayAll();
								?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>


	<div id="updateUser" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">

		    <!-- Modal content-->
			<div class="modal-content">
		    	<div class="modal-header">
		    		<h4 class="modal-title">Update Information</h4>
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		      	</div>

		      	<div class="card-body">

							<form id="submissionform" method="POST">
								<div class="form-group col-md-3">
									<div class="form-row">
										<label>ID</label>
									</div>
									<div class="form-row">
										<input type="text" class="form-control col-md-3" name="txtID" required>
									</div>
								</div>

								<div class="form-row">
									<div class="form-row">
									<div class="form-group col-md-3">
										<label for="date">Date</label>
										<input type="date" class="form-control" name="txtDate" placeholder="e.g. DD/MM/YYYY" required>
									</div>
									<div class="form-group col-md-7">
										<label>Description</label>
										<input type="text" class="form-control mr-2" name="txtDesc" placeholder="e.g. Paid Rent, Collection Received, etc." required>
									</div>
								</div>	

								<div class="form-row">
									<div class="form-group col-md-2 ">
										<label>Increase/Decrease</label><br>
										<input type="radio" id="Increase" name="radioInr" value="Increase">
										<label for="Increase">Increase</label><br>
										<input type="radio" id="Decrease" name="radioDecr" value="Decrease">
										<label for="Decrease">Decrease</label><br>
									</div>
									<div class="form-group col-md-3">
										<label for="date">Amount</label>
										<input type="text" class="form-control" name="txtBAmount" placeholder="e.g. 12345.67" required>
									</div>
									<div class="form-group col-md-5">
										<label>Balance</label>
										<input type="text" class="form-control mr-2" name="txtBalance" placeholder="e.g. 12345.67" required>
									</div>
								</div>


								<div class="form-group" style="float:right;">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<input type="submit" class="btn btn-primary mr-2" name="btnUpdate" value="Update">
								</div>
							</form>
						</div>

		      	<!--
		      	<div class="modal-footer">
		        	
			   	</div> -->
			</div>
		</div>
	</div>

	</body>
</html>