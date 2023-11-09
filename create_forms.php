<?php
// Check if the form has been submitted using POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the number of forms from the submitted data, or set to 0 if not provided
    $num_forms = isset($_POST['num_forms']) ? intval($_POST['num_forms']) : 0;
    
    // Check if a valid number of forms is provided
    if ($num_forms > 0) {
        // Redirect to the show_forms.php page with the number of forms as a query parameter
        header("Location: show_forms.php?num_forms=$num_forms");
        exit; // Terminate script execution after redirect
    } else {
        // Display an error message if an invalid number of forms is provided
        echo "Please enter a valid number of forms";
    }
}
?>