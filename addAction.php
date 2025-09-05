<html>
<head>
	<title>Add Transaction</title>
	
</head>

<body>
<?php	require_once("header.php");
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
	$type = mysqli_real_escape_string($mysqli, $_POST['type']);
	$amount = mysqli_real_escape_string($mysqli, $_POST['amount']);
	$description = mysqli_real_escape_string($mysqli, $_POST['description']);
	// Check for empty fields
	if (empty($type) || empty($amount) || empty($description)) {
		if (empty($type)) {
			echo "<font color='red'>Transaction type field is empty.</font><br/>";
		}
		
		if (empty($amount)) {
			echo "<font color='red'>Amount field is empty.</font><br/>";
		}
		
		if (empty($description)) {
			echo "<font color='red'>Description field is empty.</font><br/>";
		}
		
		// Show link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {
		// If all the fields are filled (not empty) 
		$last_balance = mysqli_query($mysqli, "SELECT `running_balance` FROM `transactionmanager` ORDER BY `id` DESC LIMIT 1");
		$running_balance = mysqli_fetch_array($last_balance)['running_balance'];
		if ($type == 'credit') {
			$credit = $amount;
			$debit = 0;
			$running_balance = $running_balance + $amount;
		} else {
			$credit = 0;
			$debit = $amount;
			$running_balance = $running_balance - $amount;
		}
		//echo "<pre>description".$description."++credit".$credit."++debit".$debit."++running_balance".$running_balance; echo "<pre>"; die();
		// Insert data into database
		$result = mysqli_query($mysqli, "INSERT INTO transactionmanager (`description`, `credit`, `debit`, `running_balance`) VALUES ('$description', $credit, $debit, $running_balance)");
		
		// Display success message

		echo '<div class="alert alert-success text-center">Transaction added successfully!</div>';
        echo "<div class='text-center'><a href='index.php' class='btn btn-primary'>View All Transactions</a></div>";
	}
}
?>
</body>
</html>
