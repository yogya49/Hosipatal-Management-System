<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="navbar">
        <div class="logo">
            <span>Architecture</span>
        </div>
        <nav>
            <ul class="nav-links">
                <li>
                    <a href="home.html">Home</a>
                    <ul class="dropdown">
                        <li><a href="updates.html">Updates</a></li>
                    </ul>
                </li>
                <li>
                    <a href="about.html">About</a>
                    <ul class="dropdown">
                        <li><a href="history.html">History</a></li>
                        <li><a href="team.html">Team</a></li>
                    </ul>
                </li>
                <li>
                    <a href="architecture.html">Architecture</a>
                    <ul class="dropdown">
                        <li><a href="classic.html">Classic</a></li>
                        <li><a href="modern.html">Modern</a></li>
                    </ul>
                </li>
                <li>
                    <a href="images.html">Images</a>
                    <ul class="dropdown">
                        <li><a href="historical.html">Historical</a></li>
                        <li><a href="tovisit.html">TO VISIT</a></li>
                    </ul>
                </li>
                <li>
                    <a href="contact.html">Contact</a>
                </li>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </nav>
    </header>

    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    <p>You're logged in. Enjoy exploring!</p>
</body>
</html>
