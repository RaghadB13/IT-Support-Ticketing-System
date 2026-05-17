<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tech_support";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// التقاط البيانات من النموذج
$issue_type     = $_POST['issue_type'] ?? '';
$description    = $_POST['description'] ?? '';
$employee_name  = $_POST['employee_name'] ?? '';
$department     = $_POST['department'] ?? '';
$request_date   = $_POST['request_date'] ?? '';
$administration = $_POST['administration'] ?? '';
$office_number  = $_POST['office_number'] ?? 0;
$phone          = $_POST['phone'] ?? '';
$email          = $_POST['email'] ?? '';
$status         = 'قيد التنفيذ'; // ✅ الحالة الابتدائية

// الاستعلام مع الحقل الجديد "status"
$stmt = $conn->prepare("INSERT INTO requests 
  (issue_type, description, employee_name, department, request_date, administration, office_number, phone, email, status)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssssisss", 
  $issue_type, $description, $employee_name, $department,
  $request_date, $administration, $office_number, $phone, $email, $status
);

// تنفيذ الحفظ
if ($stmt->execute()) {
    echo "<script>alert('تم إرسال الطلب بنجاح!'); window.location.href='index.html';</script>";
} else {
    echo "حدث خطأ أثناء الإرسال: " . $stmt->error;
}

$stmt->close();
$conn->close();?>
