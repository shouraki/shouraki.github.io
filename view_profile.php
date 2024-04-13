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

$user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;

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

function isFriend($loggedInUserId, $viewedUserId) {
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM friends WHERE (user_id = ? AND friend_id = ?) OR (user_id = ? AND friend_id = ?)");
    
    if ($stmt === false) {
        die("Error preparing the statement: " . $conn->error);
    }
    
    $stmt->bind_param("iiii", $loggedInUserId, $viewedUserId, $viewedUserId, $loggedInUserId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['count'] > 0;
}

$logged_in_user_id = $_SESSION["user_id"];
$is_friend = isFriend($logged_in_user_id, $user_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friendzone - <?php echo $user['name']; ?>'s Profile</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
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
                <li><a href="search.php">Search</a></li>
                <li><a href="message.php">Messages</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="profile">
            <div class="profile-header">
                <img src="img/<?php echo $user["profile_picture"]; ?>" alt="Profile Picture">
                <div>
                    <h2><?php echo $user['name']; ?>'s Profile</h2>
                    <p>Email: <?php echo $user['email']; ?></p>
                </div>
            </div>
            <div class="profile-info">
                <p>Biography: <?php echo $user['biography']; ?></p>
                <p>Mobile Number: <?php echo $user['mobile_number']; ?></p>
            </div>
            <?php if ($logged_in_user_id != $user_id) { ?>
                <div class="friend-actions">
                    <?php if ($is_friend) { ?>
                        <button id="remove-friend-btn" data-user-id="<?php echo $user_id; ?>">Remove Friend</button>
                    <?php } else { ?>
                        <button id="add-friend-btn" data-user-id="<?php echo $user_id; ?>">Add Friend</button>
                    <?php } ?>
                </div>
            <?php } ?>
        </section>

        <section class="posts">
            <h2><?php echo $user['name']; ?>'s Posts</h2>
            <?php
            $stmt = $conn->prepare("SELECT * FROM posts WHERE user_id = ? ORDER BY created_at DESC");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $posts_result = $stmt->get_result();

            while ($post = $posts_result->fetch_assoc()) {
                echo '<div class="post">';
                echo '<p>' . htmlspecialchars($post['content']) . '</p>';
                echo '<p class="timestamp">' . $post['created_at'] . '</p>';
                echo '<div class="post-actions">';
                echo '<a href="#" class="like-btn" data-post-id="' . $post['id'] . '">Like (' . getLikeCount($post['id']) . ')</a> | ';
                echo '<a href="post.php?post_id=' . $post['id'] . '">Comment (' . getCommentCount($post['id']) . ')</a>';
                echo '</div>';
                echo '</div>';
            }
            ?>
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

            $('#add-friend-btn').click(function() {
                var userId = $(this).data('user-id');
                
                $.ajax({
                    url: 'add_friend.php',
                    method: 'POST',
                    data: { user_id: userId },
                    success: function(response) {
                        alert(response);
                        location.reload();
                    }
                });
            });

            $('#remove-friend-btn').click(function() {
                var userId = $(this).data('user-id');
                
                $.ajax({
                    url: 'remove_friend.php',
                    method: 'POST',
                    data: { user_id: userId },
                    success: function(response) {
                        alert(response);
                        location.reload();
                    }
                });
            });
        });
    </script>
</body>
</html>