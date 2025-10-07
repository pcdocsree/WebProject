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

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    if (password_verify($password, $row['password'])) {
        header("Location: main.html"); // login success → go to main page
        exit();
    } else {
        echo "Invalid password!";
    }
} else {
    echo "No user found with this email!";
}
?>
