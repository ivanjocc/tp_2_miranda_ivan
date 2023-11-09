<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Server-side validation
	$errors = [];

	foreach ($_POST['street'] as $key => $street) {
		$street_nb = $_POST['street_nb'][$key];
		$type = $_POST['type'][$key];
		$city = $_POST['city'][$key];
		$zipcode = $_POST['zipcode'][$key];

		// Additional validations (e.g., non-empty fields)
		if (empty($street) || empty($type) || empty($city) || empty($zipcode)) {
			$errors[] = "All fields are required.";
		}

		// Zip code validation
		if (!ctype_digit($zipcode) || strlen($zipcode) !== 6) {
			$errors[] = "Zip code must be a 6-digit number.";
		}
	}

	// If no errors, proceed with database insertion
	if (empty($errors)) {
		// Database connection
		$conn = new mysqli("localhost", "root", "", "tp2_ecom1");

		// Check the connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Prepared statement for insertion
		$stmt = $conn->prepare("INSERT INTO information (street, street_nb, type, city, zipcode) VALUES (?, ?, ?, ?, ?)");

		foreach ($_POST['street'] as $key => $street) {
			$street_nb = $_POST['street_nb'][$key];
			$type = $_POST['type'][$key];
			$city = $_POST['city'][$key];
			$zipcode = $_POST['zipcode'][$key];

			// Bind parameters
			$stmt->bind_param("sissi", $street, $street_nb, $type, $city, $zipcode);

			// Execute the statement
			$stmt->execute();
		}

		// Close the connection
		$stmt->close();
		$conn->close();

		// Redirect to the homepage
		header("Location: index.php");
		exit;
	}
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles/process.css">
	<title>Return to Home</title>

</head>

<body>
	<div class="container">
		<a href="index.php"><button type="button">Go to Index</button></a>
	</div>
</body>

</html>