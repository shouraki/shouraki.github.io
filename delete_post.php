<?php
session_start();

require_once "includes/db_config.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

function deletePost($conn, $current_user_id, $post_id) {
    $stmt = $conn->prepare("SELECT user_id FROM posts WHERE id = ?");
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($post = $result->fetch_assoc()) {
        if ($post['user_id'] == $current_user_id) {
            $stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
            $stmt->bind_param("i", $post_id);
            $stmt->execute();
        }
    }
}

$current_user_id = $_SESSION["user_id"];
$post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0;

deletePost($conn, $current_user_id, $post_id);

header("Location: profile.php");
exit();
?>
