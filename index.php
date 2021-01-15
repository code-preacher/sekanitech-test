hello oche
<?php
$db = new mysqli("localhost", "root", "", "oop_6");
if ($db->connect_error) {
	die("Connection failed: " . $db->connect_error);
}

$m=mysqli_query($db,"select * from client");

$n=mysqli_query($db,'select * from account');
?>

<?php
if(isset($_POST['submit'])){
	$tb1=$_POST['tb1'];
	$tb2=$_POST['tb2'];
	$sd1=$_POST['sd1'];
	$sd2=$_POST['sd2'];
	$md1=$_POST['md1'];
	$md2=$_POST['md2'];

	if ($tb1 === $tb2) {
		echo "Tables are supposed to be different, please choose different tables";
	} elseif ($sd1==$sd2) {
		echo "Set data are supposed to be different, please choose different set data";
	}elseif ($md1==$md2) {
		echo "Matching data are supposed to be different, please choose different Matching data";
	}else{
		$q=mysqli_query($db,"update $tb1,$tb2 set $sd1={$sd2} where $md1={$md2}");
		if ($q) {
		echo "Data was successfully corrected";
	} else {
		echo "Error Correcting data";
	}
	}
	
	
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

</head>
<body>

	<div class="card text-center" style="padding:15px;">
		<h4>Data Correction</h4>
	</div><br><br> 

	<div class="container">
		<div class="row">
			<div class="col-md-6">

				<caption>Client</caption>
				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Acc_no</th>
							<th>Email</th>
							<th>Acc_type</th>
						</tr>
					</thead>
					<tbody>

						<?php foreach ($m as $k) { ?>
							<tr>
								<td><?=$k['id']?></td>
								<td><?=$k['client_name']?></td>
								<td><?=$k['client_acc_no']?></td>
								<td><?=$k['client_email']?></td>
								<td><?=$k['client_acc_type']?></td>
							</tr>
						<?php } ?>

					</tbody>
				</table>

			</div>

			<div class="col-md-6">

				<caption>Account</caption>
				<table class="table table-hover table-bordered">

					<thead>
						<tr>
							<th>Id</th>
							<th>Client_Id</th>
							<th>Acc_no</th>
						</tr>
					</thead>
					<tbody>

						<?php foreach ($n as $z) { ?>
							<tr>
								<td><?=$z['id']?></td>
								<td><?=$z['client_id']?></td>
								<td><?=$z['acc_no']?></td>
							</tr>
						<?php } ?>

					</tbody>
				</table>


			</div>
		</div>

	</div>




	<br/><br/>
	<div class="container">
		<form action="index.php" method="POST">
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="tb1">Table 1:</label>
							<select class="form-control" name="tb1">
								<option value="client">Client</option>
								<option value="account">Account</option>
							</select>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="tb2">Table 2:</label>
							<select class="form-control" name="tb2">
								<option value="client">Client</option>
								<option value="account">Account</option>
							</select>

						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label for="sd1">Data to Set 1:</label>
							<select class="form-control" name="sd1">
								<option value="client.client_name">Client(Client Name)</option>
								<option value="client.client_acc_no">Client(Client Account No)</option>
								<option value="client.client_email">Client(Client Email)</option>
								<option value="client.client_acc_type">Client(Client Account Type)</option>
								<option value="account.client_id">Account(Account Client_Id)</option>
								<option value="account.acc_no">Account(Account No)</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="sd2">Data to Set 2:</label>
							<select class="form-control" name="sd2">
								<option value="client.client_name">Client(Client Name)</option>
								<option value="client.client_acc_no">Client(Client Account No)</option>
								<option value="client.client_email">Client(Client Email)</option>
								<option value="client.client_acc_type">Client(Client Account Type)</option>
								<option value="account.client_id">Account(Account Client_Id)</option>
								<option value="account.acc_no">Account(Account No)</option>
							</select>
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label for="md1">Data to March 1:</label>
							<select class="form-control" name="md1">
								<option value="client.client_name">Client(Client Name)</option>
								<option value="client.client_acc_no">Client(Client Account No)</option>
								<option value="client.client_email">Client(Client Email)</option>
								<option value="client.client_acc_type">Client(Client Account Type)</option>
								<option value="account.client_id">Account(Account Client_Id)</option>
								<option value="account.acc_no">Account(Account No)</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="md2">Data to March 2:</label>
							<select class="form-control" name="md2">
								<option value="client.client_name">Client(Client Name)</option>
								<option value="client.client_acc_no">Client(Client Account No)</option>
								<option value="client.client_email">Client(Client Email)</option>
								<option value="client.client_acc_type">Client(Client Account Type)</option>
								<option value="account.client_id">Account(Account Client_Id)</option>
								<option value="account.acc_no">Account(Account No)</option>
							</select>
						</div>
					</div>
					
				</div>
				<div class="col-md-6">
					<input type="submit" name="submit" class="btn btn-primary col-md-6" value="Correct">
				</div>
				


			</form>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</body>
	</html>
</body>
</html>
