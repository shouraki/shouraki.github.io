<?php
require_once "includes/db_config.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $password = "";
$email_err = $password_err = "";

// Process form data when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email address.";
    } else {
        $email = trim($_POST["email"]);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty($email_err) && empty($password_err)) {
        $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                session_start();
                $_SESSION["user_id"] = $id;
                $_SESSION["email"] = $email;

                header("Location: profile.php");
                exit();
            } else {
                $password_err = "The password you entered is not valid.";
            }
        } else {
            $email_err = "No account found with that email address.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friendzone - Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>Friendzone</h1>
        <nav>
            <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="login">
            <h2>Login or sign up below!</h2>
            <form action="login.php" method="POST">
                <input type="email" name="email" placeholder="Email" required value="<?php echo htmlspecialchars($email); ?>">
                <span class="error"><?php echo $email_err; ?></span><br>

                <input type="password" name="password" placeholder="Password" required>
                <span class="error"><?php echo $password_err; ?></span><br>

                <input type="submit" value="Login">
            </form>
            <p>Need an account? <a href="register.php">Register here!</a></p>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Friendzone. All rights reserved.</p>
    </footer>
</body>
</html>