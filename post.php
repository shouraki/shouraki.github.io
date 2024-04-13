<?php
require_once "includes/db_config.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$current_user_id = $_SESSION["user_id"];

$post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $comment_content = isset($_POST['comment_content']) ? $_POST['comment_content'] : "";
    
    $stmt = $conn->prepare("INSERT INTO comments (user_id, post_id, content) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $current_user_id, $post_id, $comment_content);
    $stmt->execute();
}

$stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->bind_param("i", $post_id);
$stmt->execute();
$post_result = $stmt->get_result();
$post = $post_result->fetch_assoc();

$stmt = $conn->prepare("SELECT comments.*, users.name AS username FROM comments INNER JOIN users ON comments.user_id = users.id WHERE comments.post_id = ? ORDER BY comments.created_at DESC");
$stmt->bind_param("i", $post_id);
$stmt->execute();
$comments_result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friendzone - Post</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>Friendzone</h1>
        <nav>
            <ul>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="timeline.php">Timeline</a></li>
                <li><a href="search.php">Search</a></li>
                <li><a href="message.php">Messages</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="post">
            <h2>Post</h2>
            <p><?php echo htmlspecialchars($post['content']); ?></p>
            <p class="timestamp"><?php echo $post['created_at']; ?></p>
        </section>

        <section class="comments">
            <h3>Comments</h3>
            <?php while ($comment = $comments_result->fetch_assoc()) { ?>
                <div class="comment">
                    <p><?php echo htmlspecialchars($comment['content']); ?></p>
                    <p class="comment-meta">
                        Posted by <?php echo $comment['username']; ?> on <?php echo $comment['created_at']; ?>
                    </p>
                </div>
            <?php } ?>
        </section>

        <section class="add-comment">
            <h3>Add a Comment</h3>
            <form action="post.php?post_id=<?php echo $post_id; ?>" method="POST">
                <textarea name="comment_content" placeholder="Write a comment..." required></textarea><br>
                <input type="submit" value="Submit Comment">
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Friendzone. All rights reserved.</p>
    </footer>
</body>
</html>