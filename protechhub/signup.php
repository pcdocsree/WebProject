<?php include 'db.php'; ?>

<?php
$host = "localhost";
$user = "root";  // default XAMPP user
$pass = "";      // default XAMPP password is empty
$db   = "protechhub_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
include 'db.php'; // database connection

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // encrypt password

$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
if ($conn->query($sql) === TRUE) {
    header("Location: login.html"); // after signup, go to login page
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
