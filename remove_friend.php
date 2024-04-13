<?php
require_once "includes/db_config.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

if (!isset($_SESSION["user_id"])) {
    echo "You must be logged in to remove a friend.";
    exit();
}

$current_user_id = $_SESSION["user_id"];

$friend_user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : 0;

// remove friend from the database
$stmt = $conn->prepare("DELETE FROM friends WHERE (user_id = ? AND friend_id = ?) OR (user_id = ? AND friend_id = ?)");

if ($stmt === false) {
    die("Error preparing the statement: " . $conn->error);
}

$stmt->bind_param("iiii", $current_user_id, $friend_user_id, $friend_user_id, $current_user_id);
$stmt->execute();

echo "Friend removed successfully!";
exit();
?>