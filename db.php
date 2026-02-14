<?php
$host = "localhost";
$db_user = "root";
$password = "";
$dbname = "hospital_queue";

// Enable detailed MySQLi error reporting (for development)
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($host, $db_user, $password, $dbname);
    $conn->set_charset("utf8mb4"); // Better charset support
} catch (Exception $e) {
    error_log($e->getMessage());
    throw $e;
}
?>
