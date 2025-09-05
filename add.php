<html>
<head>
	<title>Add Transaction</title>

</head>

<body>
<?php require_once("header.php");?>
	<h3>New Transaction</h3>

	<form action="addAction.php" method="post" name="add">
		<table class="table table-striped table-hover shadow-sm" width="25%">
			<tr> 
				<td>Transaction Type</td>
				<td>
					<select class="form-select" name="type">
						<option name="credit" value="credit">Credit</option>
						<option name="debit" value="debit">Debit</option>
					</select>
				</td>
			</tr>
			<tr> 
				<td>Amount</td>
				<td><input class="form-control" type="text" name="amount" title="Amount" placeholder="Enter Amount i.e. 100" required min="1" max="10000"></td>
			</tr>
			<tr> 
				<td>Description</td>
				<td><textarea class="form-control" name="description" placeholder="Description" required maxlength ="1000"></textarea></td>
			</tr>
			<tr> 
				<td></td>
				<td><input class="btn btn-sm btn-success" type="submit" name="submit" value="Save"> <a class="btn btn-sm btn-danger" href='javascript:self.history.back();'>Cancel</a></td>
			</tr>
		</table>
	</form>
</body>
</html>

