<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $datas = $_POST['data'];
    $allData = implode(",", $datas);
    $gender = $_POST['gender'];
    $place = $_POST['place'];

    // Update user information in the same row in the database
    $sql = $conn->prepare("UPDATE exampledb SET fname=?, lname=?, email=?, mobile=?, multipleData=?, gender=?, place=? WHERE username=?");
    $sql->bind_param("ssssssss", $fname, $lname, $email, $mobile, $allData, $gender, $place, $username);

    if ($sql->execute()) {
        header('Location: index.php'); // Redirect after successful update
        exit();
    } else {
        die("Error updating: " . mysqli_error($conn));
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Info</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Complete Your Profile</h2>
        <form method="post">
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" name="fname" required>
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" name="lname" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" name="mobile" required>
            </div>
            <div class="form-group">
                <label>Skills:</label><br>
                <label><input type="checkbox" name="data[]" value="JavaScript"> JavaScript</label>
                <label><input type="checkbox" name="data[]" value="React"> React</label>
                <label><input type="checkbox" name="data[]" value="HTML"> HTML</label>
                <label><input type="checkbox" name="data[]" value="CSS"> CSS</label>
            </div>
            <div class="form-group">
                <label>Gender:</label><br>
                <label><input type="radio" name="gender" value="male" required> Male</label>
                <label><input type="radio" name="gender" value="female" required> Female</label>
                <label><input type="radio" name="gender" value="kids" required> Kids</label>
            </div>
            <div class="form-group">
                <label for="place">Select Place</label>
                <select name="place" required>
                    <option value="">Select your place</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Bangalore">Bangalore</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Mysore">Mysore</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
