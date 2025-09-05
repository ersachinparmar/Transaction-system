<?php
// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT `id`, `description`, `credit`, `debit`, `running_balance`, DATE_FORMAT(date, '%m/%d/%Y') as date FROM transactionmanager ORDER BY id DESC");
?>

<html>
<head>	
	<title>Office Transactions</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		table
		{
		text-align:center;
		border-spacing: initial;
		}
		td {
		border: solid 1px black;
		}
	</style>	
</head>

<body>
	<table class="table table-striped table-hover shadow-sm" width='80%'>
		<tr bgcolor='#DDDDDD'>
			<td><strong>Office Transactions</strong></td>
			<td></td>
			<td></td>
			<td></td>
			<td><strong><a href="add.php">+ Add Transaction</a></strong></td>
		</tr>
		<tr bgcolor='#DDDDDD'>
			<td> </td>
			<td> </td>
			<td> </td>
			<td> </td>
			<td> </td>
		</tr>
		<tr bgcolor='#DDDDDD'>
			<td><strong>Date</strong></td>
			<td><strong>Description</strong></td>
			<td><strong>Credit</strong></td>
			<td><strong>Debit</strong></td>
			<td><strong>Running Balance</strong></td>
		</tr>
		<?php
		// Fetch the next row of a result set as an associative array
		while ($res = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$res['date']."</td>";
			echo "<td>".$res['description']."</td>";
			echo "<td>".$res['credit']."</td>";	
			echo "<td>".$res['debit']."</td>";	
			echo "<td>".$res['running_balance']."</td>";
			echo "</tr>";	
		}
		?>
	</table>
</body>
</html>
