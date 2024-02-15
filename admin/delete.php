<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record from the database
    $query = $conn->prepare("DELETE FROM test1 WHERE id=?");
    $query->bind_param("i", $id);

    if ($query->execute()) {
        echo "Record deleted successfully.";
        header("Location: admin.php");
    } else {
        echo "Error deleting record: " . $query->error;
    }

    $query->close();
}

$conn->close();
?>
