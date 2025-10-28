<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
  http_response_code(200);
  exit;
}

$servername = "mysql-hyuga.alwaysdata.net";
$username = "hyuga_tugas_app";
$password = "2RtLa5ii.jU.GN4";
$dbname = "hyuga_tugas_app";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die(json_encode(["error" => "Database connection failed: " . $conn->connect_error]));
}

$data = json_decode(file_get_contents("php://input"), true);
$nama = $conn->real_escape_string($data["nama"]);
$link = $conn->real_escape_string($data["file_link"]);

$sql = "INSERT INTO riwayat_upload (nama, file_link) VALUES ('$nama', '$link')";
if ($conn->query($sql)) {
  echo json_encode(["success" => true]);
} else {
  echo json_encode(["error" => $conn->error]);
}
$conn->close();
?>
