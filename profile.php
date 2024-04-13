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

$user_id = $_SESSION["user_id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $biography = htmlspecialchars(trim($_POST["biography"]));
    $mobile_number = htmlspecialchars(trim($_POST["mobile_number"]));

    $stmt = $conn->prepare("UPDATE users SET biography = ?, mobile_number = ? WHERE id = ?");
    $stmt->bind_param("ssi", $biography, $mobile_number, $user_id);
    $stmt->execute();

    header("Location: profile.php");
    exit();
}

$stmt = $conn->prepare("SELECT name, email, biography, mobile_number, profile_picture FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friendzone - Profile</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .edit-profile button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .edit-profile form {
            margin-top: 10px;
        }

        .profile-header img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Friendzone</h1>
        <nav>
            <ul>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="timeline.php">Timeline</a></li>
                <li><a href="message.php">Messages</a></li>
                <li><a href="search.php">Search</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="profile">
            <div class="profile-header">
                <img src="img/<?php echo $user["profile_picture"]; ?>" alt="Profile Picture">
                <div>
                    <h2><?php echo $user["name"]; ?></h2>
                    <p><?php echo $user["email"]; ?></p>
                </div>
            </div>
            <div class="profile-info">
                <p><strong>Biography:</strong> <?php echo $user["biography"]; ?></p>
                <p><strong>Mobile Number:</strong> <?php echo $user["mobile_number"]; ?></p>
            </div>
            <div class="edit-profile">
                <button id="edit-profile-btn">Edit Profile</button>
                <div id="edit-profile-form" style="display: none;">
                    <h3>Edit Profile</h3>
                    <form action="profile.php" method="POST">
                        <label for="biography">Biography:</label><br>
                        <textarea name="biography"><?php echo $user["biography"]; ?></textarea><br>

                        <label for="mobile_number">Mobile Number:</label><br>
                        <input type="text" name="mobile_number" value="<?php echo $user["mobile_number"]; ?>"><br>

                        <input type="submit" value="Update">
                    </form>
                </div>
            </div>
        </section>

        <section class="post-form">
            <h3>What's on your mind now, <?php echo $user["name"]; ?>?</h3>
            <form id="post-form">
                <textarea name="content" maxlength="280" required placeholder="Write something..."></textarea><br>
                <input type="submit" value="Post">
            </form>
        </section>

        <section class="timeline">
            <h2>Recent Posts</h2>
            <div id="recent-posts">
                <?php
                // Retrieve user's posts from database
                $stmt = $conn->prepare("SELECT * FROM posts WHERE user_id = ? ORDER BY created_at DESC LIMIT 10");
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $result = $stmt->get_result();

                while ($post = $result->fetch_assoc()) {
                    echo '<div class="post">';
                    echo '<p>' . htmlspecialchars($post["content"]) . '</p>';
                    echo '<div class="post-actions">';
                    echo '<a href="#" class="like-btn" data-post-id="' . $post["id"] . '">Like (<span class="like-count">' . getLikeCount($post["id"]) . '</span>)</a> | ';
                    echo '<a href="post.php?post_id=' . $post["id"] . '">Comment (<span class="comment-count">' . getCommentCount($post["id"]) . '</span>)</a> | ';
                    echo '<a href="delete_post.php?post_id=' . $post["id"] . '" class="delete-btn">Delete</a>';
                    echo '</div>';
                    echo '</div>';
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
                var likeCountElement = $(this).find('.like-count');
                
                $.ajax({
                    url: 'like_post.php',
                    method: 'POST',
                    data: { post_id: postId },
                    success: function(response) {
                        likeCountElement.text(response);
                    }
                });
            });

            $('#post-form').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                
                $.ajax({
                    url: 'add_post.php',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.trim() !== '') {
                            $('#recent-posts').prepend(response);
                            $('#post-form')[0].reset();
                        } else {
                            console.log('Empty response received from add_post.php');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log('AJAX request failed');
                        console.log('Status: ' + status);
                        console.log('Error: ' + error);
                    }
                });
            });

            $('#edit-profile-btn').click(function() {
                $('#edit-profile-form').toggle();
            });
        });
    </script>
</body>
</html>