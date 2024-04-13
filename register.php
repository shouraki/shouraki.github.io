<?php
require_once "includes/db_config.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $email = $confirm_email = $password = $confirm_password = "";
$name_err = $email_err = $confirm_email_err = $password_err = $confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["name"]);
    }

    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email address.";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format";

    } else {
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $param_email);
        $param_email = trim($_POST["email"]);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $email_err = "This email is already taken.";
        } else {
            $email = trim($_POST["email"]);
        }
    }

    if (empty(trim($_POST["confirm_email"]))) {
        $confirm_email_err = "Please confirm your email address.";
    } else {
        $confirm_email = trim($_POST["confirm_email"]);
        if ($email != $confirm_email) {
            $confirm_email_err = "Email addresses do not match.";
        }
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm the password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if ($password != $confirm_password) {
            $confirm_password_err = "Passwords do not match.";
        }
    }

    if (empty($name_err) && empty($email_err) && empty($confirm_email_err) && empty($password_err) && empty($confirm_password_err)) {
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $param_name, $param_email, $param_password);
        $param_name = $name;
        $param_email = $email;
        $param_password = password_hash($password, PASSWORD_DEFAULT); // password hash
        $stmt->execute();

        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friendzone - Registration</title>
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
        <section class="register">
            <h2>Registration</h2>
            <form action="register.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" name="name" required value="<?php echo htmlspecialchars($name); ?>">
                <span class="error"><?php echo $name_err; ?></span><br>

                <label for="email">Email:</label>
                <input type="email" name="email" required value="<?php echo htmlspecialchars($email); ?>">
                <span class="error"><?php echo $email_err; ?></span><br>

                <label for="confirm_email">Confirm Email:</label>
                <input type="email" name="confirm_email" required value="<?php echo htmlspecialchars($confirm_email); ?>">
                <span class="error"><?php echo $confirm_email_err; ?></span><br>

                <label for="password">Password:</label>
                <input type="password" name="password" required>
                <span class="error"><?php echo $password_err; ?></span><br>

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" required>
                <span class="error"><?php echo $confirm_password_err; ?></span><br>

                <input type="submit" value="Register">
            </form>
            <p>Already have an account? <a href="login.php">Sign in here!</a></p>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Friendzone. All rights reserved.</p>
    </footer>
</body>
</html>