<?php
// $request_uri = $_SERVER['REQUEST_URI'];
// $segments = explode('/', trim($request_uri, '/'));

// if ($segments[0] === 'admin') {
//     // If the first segment is 'admin', include the admin.php file
//     include('admin/login.html');
// }
$success = isset($_GET['success']) ? $_GET['success'] : null;

// Your HTML and other content...

if ($success) {
    echo "<div class='success-message'>Form submitted successfully!</div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Information Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="text-center">
    <h2>Employee Information Form</h2>
        </div>
        <div>
        <form action="submit.php" method="post" enctype="multipart/form-data">
        <div class="row">
        <div class="col-6 h-80">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        </div>
        
        <div class="col-6 h-80">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        </div>
        
        <div class="col-6 h-80">
        <label for="mobile">Mobile:</label>
        <input type="number" id="mobile" name="mobile" required>
        </div>
        
        <div class="col-6 h-80">
        <label for="state">State:</label>
        <input type="text" id="state" name="state" required>
        </div>
        
        <div class="col-6 h-80">
        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>
        </div>
        
        <div class="col-6 h-80">
        <label for="address">Address</Address>:</label>
        <input type="text" id="address" name="address" required>
        </div>
        
        <div class="col-6 h-80">
        <label for="pin">Pin Code:</label>
        <input type="number" id="pin" name="pin" required>
        </div>
        
        <div class="col-6 h-80">
        <label for="file">Upload Image/File:</label>
        <input type="file" id="file" name="file" accept="image/*">
        </div>
        
        <div class="col-12 align-center btn">
        <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </div>
    </form>
        </div>
    </div>
</body>

<style>
    label {
    display: block;
}
.btn{
    display: flex;
    align-items: center;
    justify-content: center;

}
.h-80{
    height: 80px;
}
    </style>
</html>