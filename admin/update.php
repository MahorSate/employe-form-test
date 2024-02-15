<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);  // Debugging output

    // Ensure you are retrieving other form data correctly
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $pin = $_POST['pin'];
    
    // You might need additional logic for handling file uploads, if applicable
    $file = $_POST['file']; // Assuming 'file' is a text field, not a file upload field

    // Update the record in the database
    $query = $conn->prepare("UPDATE test1 SET name=?, email=?, mobile=?, state=?, city=?, address=?, pin=?, file=? WHERE id=?");
    $query->bind_param("ssssssssi", $name, $email, $mobile, $state, $city, $address, $pin, $file, $id);

    if ($query->execute()) {
        echo "Record updated successfully.";
        header("Location: admin.php");
    } else {
        echo "Error updating record: " . $query->error;
    }
    
    $query->close();
}

$conn->close();
?>


