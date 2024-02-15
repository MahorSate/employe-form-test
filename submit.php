<?php
include("connection.php");

// Collect form data
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$state = $_POST['state'];
$city = $_POST['city'];
$address = $_POST['address'];
$pin = $_POST['pin'];

// File upload handling
$targetDirectory = "uploads/";
$targetFile = $targetDirectory . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));


if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if ($_FILES["file"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}


if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "docx") {
    echo "Sorry, only JPG, JPEG, PNG, GIF, PDF, and DOCX files are allowed.";
    $uploadOk = 0;
}


if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        echo "uploaded <br/>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$query = $conn->prepare("INSERT INTO test1 (`name`, `email`, `mobile`, `state`, `city`, `address`, `pin`, `file`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$query->bind_param("ssssssss", $name, $email, $mobile, $state, $city, $address, $pin, $targetFile);

if ($query->execute()) {
    echo "Employee information added successfully.";
    header("Location: index.php?success=1");
} else {
    echo "Error: " . $query->error;
}

$query->close();
$conn->close();
?>
