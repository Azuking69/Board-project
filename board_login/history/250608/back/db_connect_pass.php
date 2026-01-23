<?php
// 🔗データベース연결
$servername = "db";
$username = "app";
$password = "app";
$database = "board_pass";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn -> connect_error) {
    die("연결 실패: " . $conn -> connect_error);
}
?>