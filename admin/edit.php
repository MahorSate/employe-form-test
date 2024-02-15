<?php
include("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the record based on ID
    $result = $conn->query("SELECT * FROM test1 WHERE id = $id");
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Assign values to variables
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $state = $row['state'];
        $city = $row['city'];
        $address = $row['address'];
        $pin = $row['pin'];
        $file = $row['file'];

        // Display the form with pre-filled values for editing
        echo "<form action='update.php' method='post' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='id' value='" . $id . "'>";

        // Example form with <tr> tags
        echo "<table>";
        echo "<tr><td>Name:</td><td><input type='text' name='name' value='" . $name . "'></td></tr>";
        echo "<tr><td>Email:</td><td><input type='email' name='email' value='" . $email . "'></td></tr>";
        echo "<tr><td>Mobile:</td><td><input type='number' name='mobile' value='" . $mobile . "'></td></tr>";
        echo "<tr><td>State:</td><td><input type='text' name='state' value='" . $state . "'></td></tr>";
        echo "<tr><td>City:</td><td><input type='text' name='city' value='" . $city . "'></td></tr>";
        echo "<tr><td>Address:</td><td><input type='text' name='address' value='" . $address . "'></td></tr>";
        echo "<tr><td>Pin:</td><td><input type='text' name='pin' value='" . $pin . "'></td></tr>";
        echo "<tr><td>File:</td><td><input type='file' name='file' value='" . $file . "'></td></tr>";
        // ... (other form fields pre-filled with $row values)
        echo "</table>";

        echo "<button type='submit'>Update</button>";
        echo "</form>";
    } else {
        echo "Record not found.";
    }
}

$conn->close();

?>
