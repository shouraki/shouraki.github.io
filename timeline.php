<?php
require_once "includes/db_config.php";
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
$conn = new mysqli($servername, $username, $password, $dbname);

function getLikeCount($postId) {
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM likes WHERE post_id = ?");
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['count'];
}

function getCommentCount($postId) {
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM comments WHERE post_id = ?");
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['count'];
}

$postsPerPage = 5;

$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$offset = ($currentPage - 1) * $postsPerPage;

$stmt = $conn->prepare("SELECT posts.*, users.name, users.profile_picture
                        FROM posts
                        INNER JOIN users ON posts.user_id = users.id
                        ORDER BY posts.created_at DESC
                        LIMIT ? OFFSET ?");
$stmt->bind_param("ii", $postsPerPage, $offset);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friendzone - Timeline</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
        <section class="timeline">
            <h2>Timeline</h2>
            <?php
            // Display posts
            if ($result->num_rows > 0) {
                while ($post = $result->fetch_assoc()) {
                    echo "<div class='post'>";
                    echo "<img src='img/" . $post["profile_picture"] . "' alt='Profile Picture' class='profile-picture'>";
                    echo "<p><strong>" . $post["name"] . "</strong></p>";
                    echo "<p>" . htmlspecialchars($post["content"]) . "</p>";
                    echo "<p class='meta'>Posted on " . $post["created_at"] . "</p>";
                    echo "<div class='post-actions'>";
                    echo "<a href='#' class='like-btn' data-post-id='" . $post["id"] . "'>Like (" . getLikeCount($post["id"]) . ")</a> | ";
                    echo "<a href='post.php?post_id=" . $post["id"] . "'>Comment (" . getCommentCount($post["id"]) . ")</a>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "No posts found.";
            }
            ?>

            <div class="pagination">
                <?php
                $totalPosts = $conn->query("SELECT COUNT(*) AS total FROM posts")->fetch_assoc()['total'];
                $totalPages = ceil($totalPosts / $postsPerPage);

                if ($currentPage > 1) {
                    echo "<a href='?page=" . ($currentPage - 1) . "'>Previous</a>";
                }

                for ($i = 1; $i <= $totalPages; $i++) {
                    if ($i == $currentPage) {
                        echo "<span class='current-page'>$i</span>";
                    } else {
                        echo "<a href='?page=$i'>$i</a>";
                    }
                }

                if ($currentPage < $totalPages) {
                    echo "<a href='?page=" . ($currentPage + 1) . "'>Next</a>";
                }
                ?>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Friendzone. All rights reserved.</p>
    </footer>
    <script>
        $(document).ready(function() {
            $('.like-btn').click(function(e) {
                e.preventDefault();
                var postId = $(this).data('post-id');
                var likeButton = $(this);
                $.ajax({
                    url: 'like_post.php',
                    method: 'POST',
                    data: { post_id: postId },
                    success: function(response) {
                        likeButton.text('Like (' + response + ')');
                    }
                });
            });
        });
    </script>
</body>
</html>
<?php $conn->close(); ?>