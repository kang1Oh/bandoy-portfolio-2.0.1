<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        header("location: login.php");
        exit;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAROMOB | Time Out!</title>
    <link rel="icon" type="image/x-icon" href="assets/jaromob-icon.svg">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="mediaqueries.css">
</head>
<body>
    <div id="admin">
        <h1>Oops..</h1><br>
        <p class="timeout-message">Your Session Timed Out. Please Log In again.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="submit" value="Log In" class="btn btn-color-1">
        </form>
    </div>
</body>
</html>