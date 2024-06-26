<?php 
    // Start session
    session_start();

    //Check if the admin is already logged in, if yes, redirect to admin page
    if (isset($_SESSION["username"])) {
        header("location: admin.php");
        exit;
    }
    
    //Connect to database
    require_once 'dbConfig.php'; 

    // Define variables and initialize with empty values
    $username = $password = $errormsg = "";

    // Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //variables
        $username = test_input($_POST["username"]);
        $password = test_input($_POST["password"]);

            // Prepare a select statement
            $sql = "SELECT username, password FROM adminlogin WHERE username = ?";
            $stmt = mysqli_prepare($conn, $sql);
            if ($stmt) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                // Set variable value with user input
                $param_username = $username;

                // Attempt to execute the prepared SELECT statement
                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt); //result

                    // Check if username exists in the database (1 row is returned)
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        
                        mysqli_stmt_bind_result($stmt, $username, $user_password); //if password was hashed, name the parameter as $hashed_password for readability
                        if (mysqli_stmt_fetch($stmt)) {

                            // Verify password | NOTE: if password was hashed, use password_verify function --> " if (password_verify($password, $hashed_password)) "
                            if ($password === $user_password) {
                                // If they match, start a new session
                                session_start();

                                // Store data in session variables
                                $_SESSION["username"] = $username;
                                $_SESSION["id"] = $id;
                                // Login time is stored in a session variable
                                $_SESSION["login_time_stamp"] = time(); 

                                // Redirect after successful login
                                header("location: admin.php");
                                exit;

                            } else {
                                $errormsg = "Invalid Credentials.";
                            }
                        }
                    } else {
                        $errormsg = "Invalid Credentials.";
                    }
                } else {
                    $errormsg = "Something went wrong. Try Again Later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        

        // Close connection
        mysqli_close($conn);
    }

    //clean input data
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAROMOB | Admin Login</title>
    <link rel="icon" type="image/x-icon" href="assets/jaromob-icon.svg">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="mediaqueries.css">
</head>
<body>
    <div id="admin">
        <div class="header-text">
            <h1 id="warning">WARNING !!</h1>
        </div>

        <div class="login-pic-container">
            <img src="assets/login-warning.png" alt="Login Warning Image">
        </div>

        <div class="header-text">
            <h1>This goes to the JAROMOB Content Manager Page</h1>
        </div>

        
        <div class="login-form">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div>
                    <label>Username</label>
                    <input type="text" name="username" class="input-box" required>
                </div>
                <div>
                    <label>Password </label>
                    <input type="password" name="password" class="input-box" required>
                </div>
                <div>
                    <input type="submit" value="Log In" class="btn btn-color-1">
                </div>
                <p id="status"><?php echo $errormsg?></p>
            </form>
        </div>
    </div>
    
    <div id="admin-mobile">
        <h1>Oops..</h1>
        <p>Admin Portal is not available on Mobile. <br>Login on Desktop to access the Admin Portal.</p>
    </div>
</body>
</html>