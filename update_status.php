<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tech_support";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['request_id'])) {
    $request_id = (int) $_POST['request_id'];
    $stmt = $conn->prepare("UPDATE requests SET status = 'تم التنفيذ' WHERE id = ?");
    $stmt->bind_param("i", $request_id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
header("Location: r.php");
exit;
