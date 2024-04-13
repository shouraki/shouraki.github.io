<?php
// db configuration 
require_once "includes/db_config.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

if (!isset($_SESSION["user_id"])) {
    echo "You must be logged in to add a friend.";
    exit();
}

$current_user_id = $_SESSION["user_id"];

$friend_user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : 0;

// Check if users already pals
$stmt = $conn->prepare("SELECT COUNT(*) AS count FROM friends WHERE (user_id = ? AND friend_id = ?) OR (user_id = ? AND friend_id = ?)");

if ($stmt === false) {
    die("Error preparing the statement: " . $conn->error);
}

$stmt->bind_param("iiii", $current_user_id, $friend_user_id, $friend_user_id, $current_user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row['count'] > 0) {
    echo "You are already friends with this user :).";
    exit();
}

$stmt = $conn->prepare("INSERT INTO friends (user_id, friend_id) VALUES (?, ?)");

if ($stmt === false) {
    die("Error preparing the statement: " . $conn->error);
}

$stmt->bind_param("ii", $current_user_id, $friend_user_id);
$stmt->execute();

echo "Friend added successfully!";
exit();
?>