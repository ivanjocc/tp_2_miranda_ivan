<?php
// Check if the form has been submitted using POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	header("Location: index.php"); // Redirect to index.php
	exit; // Terminate script execution after redirect
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
	<title>Show Forms</title>
</head>

<body>
	<form action="process_forms.php" method="post">
		<?php
		// Retrieve the number of forms from the query parameter, or set to 0 if not provided
		$num_forms = isset($_GET['num_forms']) ? intval($_GET['num_forms']) : 0;

		// Loop to generate form fields based on the specified number of forms
		for ($i = 1; $i <= $num_forms; $i++) {
			echo "<h3>Form $i</h3>";
			echo '<label for="street">Street:</label>';
			echo '<input type="text" name="street[]" maxlength="50">'; // Input for street with a maximum length of 50 characters

			echo '<label for="street_nb">Street Number:</label>';
			echo '<input type="number" name="street_nb[]">'; // Input for street number

			echo '<label for="type">Type:</label>';
			echo '<select name="type[]">';
			echo '<option value="delivery">Delivery</option>';
			echo '<option value="billing">Billing</option>';
			echo '<option value="other">Other</option>';
			echo '</select>'; // Dropdown for type

			echo '<label for="city">City:</label>';
			echo '<select name="city[]">';
			echo '<option value="Montreal">Montreal</option>';
			echo '<option value="Laval">Laval</option>';
			echo '<option value="Toronto">Toronto</option>';
			echo '<option value="Quebec">Quebec</option>';
			echo '</select>'; // Dropdown for city

			echo '<label for="zipcode">Zipcode:</label>';
			echo '<input type="text" name="zipcode[]" maxlength="6">'; // Input for zipcode with a maximum length of 6 characters
		}
		?>
		<input type="submit" name="confirm" value="Confirm"> <!-- Submit button for form -->

		<a href="index.php"><button type="button">Go to Index</button></a> <!-- Button to go back to the index.php page -->
	</form>
</body>

</html>