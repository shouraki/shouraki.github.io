<?php
// db 
require_once "includes/db_config.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

if (!isset($_SESSION["user_id"])) {
    exit();
}

$user_id = $_SESSION["user_id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = htmlspecialchars(trim($_POST["content"]));

    $stmt = $conn->prepare("INSERT INTO posts (user_id, content) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $content);
    
    if ($stmt->execute()) {
        $post_id = $stmt->insert_id;
        
        $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $post = $result->fetch_assoc();

        $post_html = '<div class="post">';
        $post_html .= '<p>' . htmlspecialchars($post["content"]) . '</p>';
        $post_html .= '<div class="post-actions">';
        $post_html .= '<a href="#" class="like-btn" data-post-id="' . $post["id"] . '">Like (<span class="like-count">0</span>)</a> | ';
        $post_html .= '<a href="post.php?post_id=' . $post["id"] . '">Comment (<span class="comment-count">0</span>)</a> | ';
        $post_html .= '<a href="delete_post.php?post_id=' . $post["id"] . '" class="delete-btn">Delete</a>';
        $post_html .= '</div>';
        $post_html .= '</div>';

        echo $post_html;
    } else {
        echo "Error inserting post: " . $stmt->error;
    }
}

$conn->close();
?>