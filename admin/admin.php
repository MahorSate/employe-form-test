<?php
include("connection.php");

// Check if the user is logged in (implement your authentication mechanism)

// Fetch and display employee data

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}


$result = $conn->query("SELECT * FROM test1");

echo "<table border='1'>
<tr>
<th>Name</th>
<th>Email</th>
<th>Mobile</th>
<th>state</th>
<th>City</th>
<th>Address</th>
<th>Pin</th>
<th>File</th>

<!-- ... (add more columns based on your fields) -->
<th>Action</th>
</tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['mobile']."</td>";
    echo "<td>".$row['state']."</td>";
    echo "<td>".$row['city']."</td>";
    echo "<td>".$row['address']."</td>";
    echo "<td>".$row['pin']."</td>";
    echo "<td><img src='../" . $row['file'] . "' alt='Employee Image'></td>";

    // ... (display other columns)
    echo "<td><a href='edit.php?id=".$row['id']."'>Edit</a> | <a href='delete.php?id=".$row['id']."'>Delete</a></td>";
    echo "</tr>";
}

echo "</table>";

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    <!-- Your admin dashboard content goes here -->
    <a href="logout.php">Logout</a>
</body>
</html>