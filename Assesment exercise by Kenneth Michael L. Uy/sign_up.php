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
		
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
					</div>
					<div class="col-lg-4">
						<div id="form-signup" class="form-group">
							<h3>Sign Up</h3>
							<form  method="POST" action="register.php">
								
									<input type="text" name="usernamee" class="form-control" placeholder="Username:" id="user-name" required><br>
									<span id="show-name" ></span>
									<input type="password" name="passwordd" class="form-control" placeholder="Password:" id="pass-word" required><br>
									<input type="password" name="cpassword" class="form-control" placeholder="Confirm Password:" id="cpass-word" required><br>
									<span id="show-pass"></span>
									<input type="text" name="firstname" class="form-control" placeholder="First Name:" id="first-name" required><br>
									<input type="text" name="lastname" class="form-control" placeholder="Last Name:" id="last-name" required><br>
									<h5>Account Type:</h5>
									<select name = "type" id="type" class="form-control" type="text" placeholder="account type"><br><br>
                                        <option value="BillingStaff">Billing Staff</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Cashier">Cashier</option>
                                    </select><br><br>
									
								<button style="float:right;" onclick="clickk()" name="register" type="submit" id="button" class="btn btn-default" >Register</button>
								<button onclick="window.location.href='index.php'" type="submit" id="button"class="btn btn-default" >Back</button>
								
							</form>
						</div>
					</div>
					<div class="col-lg-4">
					</div>				
				</div>
			</div>
		
	</body>
	
	<footer>
		
	</footer>
	
</html>

<script>


$('#user-name').keyup(function () {
	if ($(this).val().length < 4 )
	{
		$('#show-name').text($(this).val()+" is too short. " );
	}else {
		$('#show-name').text("" );
	}
});

var password="";

$('#pass-word').keyup(function () {
	password = $(this).val();
});
$('#cpass-word').keyup(function () {
												
if ($(this).val() !=  password ){
	$('#show-pass').text("Password doesn't match." );
}else{
	$('#show-pass').text("" );
													
}
	$('#show-cpass').text($(this).val());
});
</script>