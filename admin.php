<?php
    // Start session
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION["username"])) {
        // If user is not logged in, redirect to login page
        header("location: login.php");
        exit;
    }

    if(time()-$_SESSION["login_time_stamp"] >1800)  
    {
        session_unset();
        session_destroy();
        header("Location:sessionTimeout.php");
        echo "Session Timeout";
    }

    require_once 'dbConfig.php'; 

    // If the user clicked the logout button
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])) {
        // Unset all session variables (id, username)
        $_SESSION = array();

        // Destroy the session
        session_destroy();

        // Delete the session cookies
        setcookie(session_name(), '', time() - 3600, '/');

        // Redirect to the login page
        header("location: login.php");
        exit;
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAROMOB | Admin Portal</title>
    <link rel="icon" type="image/x-icon" href="assets/jaromob-icon.svg">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="mediaqueries.css">
</head>
<body>
    <div id="admin">
        <nav id="desktop-nav">
                <div>
                    <h1>Welcome to the Admin Portal</h1>
                </div>
                <div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <input type="submit" name="logout" value="Log Out" class="btn btn-color-1">
                    </form>
                </div>
        </nav>
    
        <section id="edit experience">
            <h1 class="title">Edit Experience</h1>
        </section>
        <hr>

        <section id="edit about">
            <h1 class="title">Edit About</h1>
        </section>
        <hr>

        <section id="edit recent-works">
            <h1 class="title">Edit Displayed Portfolio</h1>
        </section>
        <hr>

        <section id="edit comms">
            <h1 class="title">Edit Commission Info</h1>
        </section>
    </div>

    <div id="admin-mobile">
        <h1>Oops..</h1>
        <p>Admin Portal is not available on Mobile. <br>Login on Desktop to access the Admin Portal.</p>
    </div>

</body>
</html>