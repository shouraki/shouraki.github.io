<?php

require_once "includes/db_config.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

if (!isset($_SESSION["user_id"])) {
    echo "error";
    exit();
}

$current_user_id = $_SESSION["user_id"];

$post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;

$stmt = $conn->prepare("SELECT * FROM likes WHERE user_id = ? AND post_id = ?");
$stmt->bind_param("ii", $current_user_id, $post_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $stmt = $conn->prepare("INSERT INTO likes (user_id, post_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $current_user_id, $post_id);
    $stmt->execute();

} else {
    
    $stmt = $conn->prepare("DELETE FROM likes WHERE user_id = ? AND post_id = ?");
    $stmt->bind_param("ii", $current_user_id, $post_id);
    $stmt->execute();
}

$stmt = $conn->prepare("SELECT COUNT(*) AS count FROM likes WHERE post_id = ?");
$stmt->bind_param("i", $post_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$like_count = $row['count'];

echo $like_count;
exit();
?>