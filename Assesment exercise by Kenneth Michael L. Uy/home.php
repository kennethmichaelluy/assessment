<?php
include('database_connection.php');	
session_start();
	if(isset($_SESSION['account'])){
?>
<!DOCTYPE >
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Exercise</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/script" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

		
	</head>
	<body>
	
	
		
			<div id="home-body" class="container">
				<div class="row">
					<div class ="col-lg-10">
					</div>
					<div id="name-pos" class="col-lg-2">
						<?php
							$con = mysqli_connect("localhost", "root", "", "database_exercise");
							$q = mysqli_query($con, "SELECT * FROM `accounts` WHERE `username` = '".$_SESSION['account']."'  ");
							while ($row = mysqli_fetch_assoc($q)) {
								echo'<h3> ' . $row['first_name'] . ' ' . $row['last_name'] . '<br><small>' . $row['type'] . '</small></h3>';
							}
						?>
						<button onclick="window.location.href='logout.php'" type="submit" id="button"class="btn btn-default" >Logout</button>
					</div>	
				</div>	
				
				<div class="row">
					<div class="col-lg-12">
						<h3>Welcome Home</h3>
						<?php
						
							include('database_connection.php');	
							
							$account = "SELECT `username` FROM `accounts` WHERE `type` = 'Admin'";
							$result = mysqli_query($conn, $account);
	
		
							while ($row = mysqli_fetch_assoc($result)) {
				
							$adminName = $row['username'];
						  
							}
							
							
							$account = "SELECT `username` FROM `accounts` WHERE `type` = 'BillingStaff'";
							$result = mysqli_query($conn, $account);
	
		
							while ($row = mysqli_fetch_assoc($result)) {
				
							$billingName = $row['username'];
						  
							}
							
							
							$account = "SELECT `username` FROM `accounts` WHERE `type` = 'Cashier'";
							$result = mysqli_query($conn, $account);
	
							
							while ($row = mysqli_fetch_assoc($result)) {
				
							$cashierName = $row['username'];
						  
							}
							
							if($_SESSION['account'] == $cashierName){
								$a = date("Y-m-d 00:00:00");
								$b = date("Y-m-d", strtotime("+1 week"));
								
									$account = "SELECT * FROM `tasks` WHERE `owner_name` = 'Cashier' AND `date` >= '$a' AND `date` <= '$b' AND status='pending' ";
									$result = mysqli_query($conn, $account);
	
									echo'<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
									echo'<thead>';
									echo'<tr>';
									echo'<th>Task</th>';
									echo'<th>Status</th>';
									echo'<th>Date pending</th>';
									echo'<th>Owner</th>';
									echo'</tr>';
									echo'</thead>';
									if ($result->num_rows > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
									echo'<tr>';
										echo '<td>'.$row['task_name'].'</td>';
										echo '<td>'.$row['status'].'</td>';
										echo '<td>'.$row['date'].'</td>';
										echo '<td>'.$row['owner_name'].'</td>';
									echo'</tr>';
									}}else{
										echo"<h1>No TASKS pending for Cashier this week</h1>";
									}
								echo'</table>';
							}
							
							
							if($_SESSION['account'] == $billingName){
								$a = date("Y-m-d 00:00:00");
								$b = date("Y-m-d", strtotime("+1 week"));
								
									$account = "SELECT * FROM `tasks` WHERE `owner_name` = 'BillingStaff' AND `date` >= '$a' AND `date` <= '$b' AND status='pending' ";
									$result = mysqli_query($conn, $account);
	
									echo'<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
									echo'<thead>';
									echo'<tr>';
									echo'<th>Task</th>';
									echo'<th>Status</th>';
									echo'<th>Date pending</th>';
									echo'<th>Owner</th>';
									echo'</tr>';
									echo'</thead>';
									if ($result->num_rows > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
									echo'<tr>';
										echo '<td>'.$row['task_name'].'</td>';
										echo '<td>'.$row['status'].'</td>';
										echo '<td>'.$row['date'].'</td>';
										echo '<td>'.$row['owner_name'].'</td>';
									echo'</tr>';
									}}else{
										echo"<h1>No TASKS pending for BillingStaff this week</h1>";
									}
								echo'</table>';
							}
							
							if($_SESSION['account'] == $adminName){
								$a = date("Y-m-d 00:00:00");
								$b = date("Y-m-d", strtotime("+1 week"));
								
									$account = "SELECT * FROM `tasks` WHERE `owner_name` = 'Admin' AND `date` >= '$a' AND `date` <= '$b' AND status='pending' ";
									$result = mysqli_query($conn, $account);
	
									echo'<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
									echo'<thead>';
									echo'<tr>';
									echo'<th>Task</th>';
									echo'<th>Status</th>';
									echo'<th>Date pending</th>';
									echo'<th>Owner</th>';
									echo'</tr>';
									echo'</thead>';
									if ($result->num_rows > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
									echo'<tr>';
										echo '<td>'.$row['task_name'].'</td>';
										echo '<td>'.$row['status'].'</td>';
										echo '<td>'.$row['date'].'</td>';
										echo '<td>'.$row['owner_name'].'</td>';
									echo'</tr>';
									}}else{
										echo"<h1>No TASKS pending for Admin this week</h1>";
									}
								echo'</table>';
							}
						
							
						
						?>
					</div>
				</div>
			</div>
								
				
		
	</body>
	
	<footer>
		
	</footer>
	
</html>



<?php
}else{
		header('location:index.php');
	    }
	
?>