<?php
// اتصال قاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tech_support";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// استقبال الفلاتر
$department = $_GET['department'] ?? 'all';
$selected_date = $_GET['selected_date'] ?? '';

// بناء شرط WHERE
$conditions = [];
if ($department !== 'all') {
    $conditions[] = "department = '" . $conn->real_escape_string($department) . "'";
}
if (!empty($selected_date)) {
    $conditions[] = "request_date = '" . $conn->real_escape_string($selected_date) . "'";
}

$where = count($conditions) ? 'WHERE ' . implode(' AND ', $conditions) : '';
$query = "SELECT * FROM requests $where ORDER BY request_date DESC";
$result = $conn->query($query);

$rows = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
}

$conn->close();

// خزّن البيانات في ملف JSON مؤقت لقرائتها من html (أو استخدم جلسة - لكن هذا أبسط)
file_put_contents('requests_data.json', json_encode([
    'department' => $department,
    'selected_date' => $selected_date,
    'rows' => $rows
]));

// إعادة توجيه لصفحة HTML
header("Location: r.html");
exit;
