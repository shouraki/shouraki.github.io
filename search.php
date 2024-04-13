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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friendzone - Search</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .profile-picture {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
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
        <section class="search">
            <h2>Search for Friends</h2>
            <form id="search-form">
                <input type="text" name="query" id="search-input" placeholder="Enter name">
                <input type="submit" value="Search">
            </form>

            <div id="search-results"></div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Friendzone. All rights reserved.</p>
    </footer>

    <script>
        $(document).ready(function() {
            $('#search-form').submit(function(event) {
                event.preventDefault();
                var query = $('#search-input').val();
                searchUsers(query);
            });

            $('#search-input').keyup(function() {
                var query = $(this).val();
                searchUsers(query);
            });

            function searchUsers(query) {
                $.ajax({
                    url: 'search_users.php',
                    method: 'GET',
                    data: { query: query },
                    success: function(response) {
                        $('#search-results').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.log('AJAX request failed');
                        console.log('Status: ' + status);
                        console.log('Error: ' + error);
                    }
                });
            }

            $(document).on('click', '.add-friend-btn', function() {
                var userId = $(this).data('user-id');
                addFriend(userId);
            });

            function addFriend(userId) {
                $.ajax({
                    url: 'add_friend.php',
                    method: 'POST',
                    data: { user_id: userId },
                    success: function(response) {
                        alert(response);
                    }
                });
            }
        });
    </script>
</body>
</html>