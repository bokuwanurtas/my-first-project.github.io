<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio_db";

try {
    $conn = new PDO("mysql:host=$servername;port=3307;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $name = $_POST['name'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO contacts (name, message) VALUES (:name, :message)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':message', $message);
    $stmt->execute();

    // Display success message and redirect after 3 seconds
    echo "Сообщение успешно отправлено! Вы будете перенаправлены на главную страницу через 3 секунды...";
    header("Refresh: 3; url=index.html");
    exit();
} catch(PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
}

$conn = null;
?>