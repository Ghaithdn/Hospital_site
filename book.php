<?php
$config = require 'config.php';
try {
    $pdo = new PDO(
        "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4",
        $config['user'],
        $config['pass']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed.");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name  = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $date  = htmlspecialchars($_POST['date']);

    $sql = "INSERT INTO bookings (name, phone, email, consultation_date)
            VALUES (:name, :phone, :email, :date)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name'  => $name,
        ':phone' => $phone,
        ':email' => $email,
        ':date'  => $date
    ]);

    echo "<script>alert('✅ Booking successful!'); window.location.href='index.html#book';</script>";
} else {
    header("Location: index.html");
    exit();
}
?>
