<?php
require_once "includes/db_config.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// search query from ajax
$search_query = isset($_GET['query']) ? $_GET['query'] : '';

$stmt = $conn->prepare("SELECT id, name, email, profile_picture FROM users WHERE name LIKE ?");
$search_term = '%' . $search_query . '%';
$stmt->bind_param("s", $search_term);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo '<h3>Search Results</h3>';
    echo '<ul class="search-results">';
    while ($user = $result->fetch_assoc()) {
        echo '<li>';
        echo '<img src="img/' . $user['profile_picture'] . '" alt="Profile Picture" class="profile-picture">';
        echo '<a href="view_profile.php?user_id=' . $user['id'] . '">';
        echo $user['name'] . ' (' . $user['email'] . ')';
        echo '</a>';
        echo '<button class="add-friend-btn" data-user-id="' . $user['id'] . '">Add Friend</button>';
        echo '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>No users found.</p>';
}

$conn->close();
?>