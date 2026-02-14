<?php
// Use environment variables when set (live/production), else local XAMPP defaults
$host     = getenv('MYSQL_HOST')     ?: 'localhost';
$db_user  = getenv('MYSQL_USERNAME') ?: 'root';
$password = getenv('MYSQL_PASSWORD') ?: '';
$dbname   = getenv('MYSQL_DATABASE') ?: 'hospital_queue';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($host, $db_user, $password, $dbname);
    $conn->set_charset("utf8mb4");
} catch (Exception $e) {
    error_log($e->getMessage());
    throw $e;
}
?>
