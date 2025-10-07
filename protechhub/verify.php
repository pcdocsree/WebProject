<?php
if(isset($_GET['email'])){
    $email = $_GET['email'];
}
?>

<h2>Email Verification</h2>
<form method="POST" action="">
    <input type="hidden" name="email" value="<?php echo $email; ?>">
    <input type="text" name="code" placeholder="Enter verification code" required>
    <button type="submit" name="verify">Verify</button>
</form>

<?php
if(isset($_POST['verify'])){
    $email = $_POST['email'];
    $code = $_POST['code'];

    $conn = new mysqli("localhost","root","","urbantech");
    $result = $conn->query("SELECT * FROM bookings WHERE email='$email' AND code='$code'");

    if($result->num_rows > 0){
        $conn->query("UPDATE bookings SET verified=1 WHERE email='$email'");
        echo "✅ Booking Verified!";
    } else {
        echo "❌ Wrong code!";
    }
}
?>
