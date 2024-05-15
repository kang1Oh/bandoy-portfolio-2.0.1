<?php
    // Start session
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION["username"])) {
        // If user is not logged in, redirect to login page
        header("location: login.php");
        exit;
    }

    //Session Timeout
    if(time()-$_SESSION["login_time_stamp"] >10800)  {
        session_unset();
        session_destroy();
        header("Location:sessionTimeout.php");
    }

    //connect to database
    require_once 'dbConfig.php'; 

    //Initialize input-boxes with data from database
        $sql1 = "SELECT feature_one, feature_two, feature_three FROM commissions WHERE id = 1";
        $sql2 = "SELECT feature_one, feature_two, feature_three FROM commissions WHERE id = 2";
        $sql3 = "SELECT feature_one, feature_two, feature_three FROM commissions WHERE id = 3";
        $tier1 = $conn->query($sql1);
        $tier2 = $conn->query($sql2);
        $tier3 = $conn->query($sql3);

        if ($tier1->num_rows > 0) {
            $row = $tier1->fetch_assoc();

            $t1f1 = $row["feature_one"];
            $t1f2 = $row["feature_two"];
            $t1f3 = $row["feature_three"];
        } else {
            $t1f1 = "";
            $t1f2 = "";
            $t1f3 = "";
        }

        if ($tier2->num_rows > 0) {
            $row = $tier2->fetch_assoc();

            $t2f1 = $row["feature_one"];
            $t2f2 = $row["feature_two"];
            $t2f3 = $row["feature_three"];
        } else {
            $t2f1 = "";
            $t2f2 = "";
            $t2f3 = "";
        }

        if ($tier3->num_rows > 0) {
            $row = $tier3->fetch_assoc();

            $t3f1 = $row["feature_one"];
            $t3f2 = $row["feature_two"];
            $t3f3 = $row["feature_three"];
        } else {
            $t3f1 = "";
            $t3f2 = "";
            $t3f3 = "";
        }
    //end of initialization
    
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
    
    //SQL TO EDIT PORTFOLIO DATA STORED IN DATABASE
        //EDIT ABOUT ME SECTION
            //Editing Experience 1 in About Me Section
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["exp1-btn"])){
                    $xp_yrs = $_POST['xp1_years'];
                    $xp_dsc = $_POST['xp1_desc'];

                    $sql = "UPDATE experience SET xp_in_years = '$xp_yrs', experience_desc = '$xp_dsc' WHERE id=1";

                    if ($conn->query($sql) === TRUE) {
                        echo '<script>alert("Experience 1 Updated!")</script>'; 
                    } else {
                        echo '<script>alert("Error updating record: " . $conn->error)</script>';
                    }

                    $conn->close(); 
                }
            //Editing Experience 2 in About Me Section
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["exp2-btn"])){
                    $xp_yrs = $_POST['xp2_years'];
                    $xp_dsc = $_POST['xp2_desc'];

                    $sql = "UPDATE experience SET xp_in_years = '$xp_yrs', experience_desc = '$xp_dsc' WHERE id=2";

                    if ($conn->query($sql) === TRUE) {
                        echo '<script>alert("Experience 2 Updated!")</script>'; 
                    } else {
                        echo '<script>alert("Error updating record: " . $conn->error)</script>';
                    }

                    $conn->close(); 
                }
            //Editing About Paragraph in About Me Section
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["about-btn"])){
                    $abt_para = $_POST['abt-me-paragraph'];

                    // Prepare the SQL statement
                    $sql = "UPDATE about SET about_description = ? WHERE id=1";
                    $stmt = $conn->prepare($sql);

                    // Bind the parameter to the prepared statement
                    $stmt->bind_param("s", $abt_para);

                    // Execute the statement
                    if ($stmt->execute()) {
                        echo '<script>alert("About Me Updated!")</script>'; 
                    } else {
                        echo '<script>alert("Error updating record: ' . $stmt->error . '")</script>';
                    }

                    // Close the statement
                    $stmt->close();
                }
            
        //EDIT PROJECTS SECTION
            //function to upload image
                function upload_image($img, $img_title, $tbl_name, $index, $conn) {
                    $fileName = basename($img['name']);
                    $fileSize = $img['size'];
                    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                
                    $allowed = array('jpg', 'jpeg', 'png');
                
                    if (in_array($fileType, $allowed)) {
                        if ($fileSize < 3000000) { //3 MB maximum image
                            $image = $img['tmp_name'];
                            $imageContent = file_get_contents($image);
                
                            // Prepare an SQL statement
                            $stmt = $conn->prepare("UPDATE $tbl_name SET image = ?, image_title = ? WHERE id = ?");
                            $stmt->bind_param("ssi", $imageContent, $img_title, $index);
                
                            // Execute the statement
                            if ($stmt->execute()) {
                                echo '<script>alert("Displayed Profile Updated!")</script>'; 
                            } else {
                                echo '<script>alert("Error updating record: " . $stmt->error)</script>';
                            }
                
                            $stmt->close();
                        } else {
                            echo '<script>alert("File Size is too large.")</script>'; 
                        }
                    } else {
                        echo '<script>alert("Invalid File Type. Only .jpg, .jpeg, .png files are allowed.")</script>'; 
                    }
                }

            //Edit Recent Art
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["art1-btn"])){
                    require_once 'dbConfig.php';
                    $image = $_FILES["art-1"];
                    $image_title = $_POST["art-1-title"];
                    $tbl_name = "recent_art";
                    $index = 1;
                    upload_image($image, $image_title, $tbl_name, $index, $conn);
                }
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["art2-btn"])){
                    require_once 'dbConfig.php'; 
                    $image = $_FILES["art-2"];
                    $image_title = $_POST["art-2-title"];
                    $tbl_name = "recent_art";
                    $index = 2;
                    upload_image($image, $image_title, $tbl_name, $index, $conn);
                }
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["art3-btn"])){
                    require_once 'dbConfig.php';
                    $image = $_FILES["art-3"];
                    $image_title = $_POST["art-3-title"];
                    $tbl_name = "recent_art";
                    $index = 3;
                    upload_image($image, $image_title, $tbl_name, $index, $conn);
                }
            //Edit Recent Code
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["code1-btn"])){
                    require_once 'dbConfig.php';
                    $image = $_FILES["code-1"];
                    $image_title = $_POST["code-1-title"];
                    $tbl_name = "recent_code";
                    $index = 1;
                    upload_image($image, $image_title, $tbl_name, $index, $conn);
                }
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["code2-btn"])){
                    require_once 'dbConfig.php';
                    $image = $_FILES["code-2"];
                    $image_title = $_POST["code-2-title"];
                    $tbl_name = "recent_code";
                    $index = 2;
                    upload_image($image, $image_title, $tbl_name, $index, $conn);
                }
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["code3-btn"])){
                    require_once 'dbConfig.php';
                    $image = $_FILES["code-3"];
                    $image_title = $_POST["code-3-title"];
                    $tbl_name = "recent_code";
                    $index = 3;
                    upload_image($image, $image_title, $tbl_name, $index, $conn);
                }
            //Edit Recent Games
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["game1-btn"])){
                    require_once 'dbConfig.php';
                    $image = $_FILES["game-1"];
                    $image_title = $_POST["game-1-title"];
                    $tbl_name = "recent_game";
                    $index = 1;
                    upload_image($image, $image_title, $tbl_name, $index, $conn);
                }
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["game2-btn"])){
                    require_once 'dbConfig.php';
                    $image = $_FILES["game-2"];
                    $image_title = $_POST["game-2-title"];
                    $tbl_name = "recent_game";
                    $index = 2;
                    upload_image($image, $image_title, $tbl_name, $index, $conn);
                }
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["game3-btn"])){
                    require_once 'dbConfig.php';
                    $image = $_FILES["game-3"];
                    $image_title = $_POST["game-3-title"];
                    $tbl_name = "recent_game";
                    $index = 3;
                    upload_image($image, $image_title, $tbl_name, $index, $conn);
                }
        //EDIT COMMISSIONS SECTION
            //Editing Tier 1 in Commissions Section
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tier1-btn"])){
                    $feature1 = $_POST["t1-f1"];
                    $feature2 = $_POST["t1-f2"];
                    $feature3 = $_POST["t1-f3"];

                    $sql = "UPDATE commissions SET feature_one = '$feature1', feature_two = '$feature2', feature_three = '$feature3' WHERE id=1";

                    if ($conn->query($sql) === TRUE) {
                        echo '<script>alert("Tier 1 Updated!")</script>'; 
                    } else {
                        echo '<script>alert("Error updating record: " . $conn->error)</script>';
                    }

                    $conn->close(); 
                }
            //Editing Tier 2 in Commissions Section
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tier2-btn"])){
                    $feature1 = $_POST["t2-f1"];
                    $feature2 = $_POST["t2-f2"];
                    $feature3 = $_POST["t2-f3"];

                    $sql = "UPDATE commissions SET feature_one = '$feature1', feature_two = '$feature2', feature_three = '$feature3' WHERE id=2";

                    if ($conn->query($sql) === TRUE) {
                        echo '<script>alert("Tier 2 Updated!")</script>'; 
                    } else {
                        echo '<script>alert("Error updating record: " . $conn->error)</script>';
                    }

                    $conn->close(); 
                }
            //Editing Tier 3 in Commissions Section
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tier3-btn"])){
                    $feature1 = $_POST["t3-f1"];
                    $feature2 = $_POST["t3-f2"];
                    $feature3 = $_POST["t3-f3"];

                    $sql = "UPDATE commissions SET feature_one = '$feature1', feature_two = '$feature2', feature_three = '$feature3' WHERE id=3";

                    if ($conn->query($sql) === TRUE) {
                        echo '<script>alert("Tier 3 Updated!")</script>'; 
                    } else {
                        echo '<script>alert("Error updating record: " . $conn->error)</script>';
                    }

                    $conn->close(); 
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
    
        <!-- Edit About Section -->
        <section id="edit-about">
            <h1 class="title">Edit About Me</h1>
            <div class="tab-container">
                <div class="tab-1">
                    <h2 class="subtitle">About Me (Experience 1)</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div>
                            <p>Change Years of Experience:</p>
                            <input type="text" name="xp1_years" class="input-box" required>
                        </div>
                        <div class="exp-details">
                            <p>Experience Details:</p>
                            <input type="text" name="xp1_desc" class="input-box" required>
                        </div>
                        <div>
                            <input type="submit" name="exp1-btn" value="Edit Exp. 1" class="btn btn-color-1">
                        </div>
                    </form>
                </div>
                <div class="tab-2">
                    <h2 class="subtitle">About Me (Experience 2)</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div>
                            <p>Change Years of Experience:</p>
                            <input type="text" name="xp2_years" class="input-box" required>
                        </div>
                        <div class="exp-details">
                            <p>Experience Details:</p>
                            <input type="text" name="xp2_desc" class="input-box" required>
                        </div>
                        <div>
                            <input type="submit" name="exp2-btn" value="Edit Exp. 2" class="btn btn-color-1">
                        </div>
                    </form>
                </div>
            </div>
            <div class="about-container">
                <h2 class="subtitle">About Me (Details)</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div>
                            <p>Change About Me Paragraph:</p>
                            <textarea name="abt-me-paragraph" class="input-box" rows="10" required></textarea>
                        </div>
                        <div>
                            <input type="submit" name="about-btn" value="Edit About Me" class="btn btn-color-1">
                        </div>
                    </form>
            </div>
        </section>
        <hr>
        
        <!-- Edit Portfolio Section -->
        <section id="edit-portfolio"> 
            <h1 class="title">Edit Displayed Portfolio</h1>
            <div class="tab-container">
                <div class="tab-1"> <!-- Edit Recent Art -->
                    <h2 class="subtitle">Edit Recent Art</h2>
                        <div class="upload-img">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                <div>
                                    <p>Artwork 1 Thumbnail:</p>
                                    <input type="file" name="art-1" class="btn-color-1" required>
                                    <p>Title:</p>
                                    <input type="text" name="art-1-title" class="input-box" required>
                                </div>
                                <div>
                                    <input type="submit" name="art1-btn" value="Edit Artwork 1" class="btn btn-color-1">
                                </div>
                            </form>
                        </div>
                        <div class="upload-img">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                <div>
                                    <p>Artwork 2 Thumbnail:</p>
                                    <input type="file" name="art-2" class="btn-color-1" required>
                                    <p>Title:</p>
                                    <input type="text" name="art-2-title" class="input-box" required>
                                </div>
                                <div>
                                    <input type="submit" name="art2-btn" value="Edit Artwork 2" class="btn btn-color-1">
                                </div>
                            </form>
                        </div>
                        <div class="upload-img">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                <div>
                                    <p>Artwork 3 Thumbnail:</p>
                                    <input type="file" name="art-3" class="btn-color-1" required>
                                    <p>Title:</p>
                                    <input type="text" name="art-3-title" class="input-box" required>
                                </div>
                                <div>
                                    <input type="submit" name="art3-btn" value="Edit Artwork 3" class="btn btn-color-1">
                                </div>
                            </form>
                        </div>
                </div>
                <div class="tab-1"> <!-- Edit Recent Programs -->
                    <h2 class="subtitle">Edit Recent Programs</h2>
                        <div class="upload-img">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                <div>
                                    <p>Program 1 Thumbnail:</p>
                                    <input type="file" name="code-1" class="btn-color-1" required>
                                    <p>Title:</p>
                                    <input type="text" name="code-1-title" class="input-box" required>
                                </div>
                                <div>
                                    <input type="submit" name="code1-btn" value="Edit Program 1" class="btn btn-color-1">
                                </div>
                            </form>
                        </div>
                        <div class="upload-img">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                <div>
                                    <p>Program 2 Thumbnail:</p>
                                    <input type="file" name="code-2" class="btn-color-1" required>
                                    <p>Title:</p>
                                    <input type="text" name="code-2-title" class="input-box" required>
                                </div>
                                <div>
                                    <input type="submit" name="code2-btn" value="Edit Program 2" class="btn btn-color-1">
                                </div>
                            </form>
                        </div>
                        <div class="upload-img">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                <div>
                                    <p>Program 3 Thumbnail:</p>
                                    <input type="file" name="code-3" class="btn-color-1" required>
                                    <p>Title:</p>
                                    <input type="text" name="code-3-title" class="input-box" required>
                                </div>
                                <div>
                                    <input type="submit" name="code3-btn" value="Edit Program 3" class="btn btn-color-1">
                                </div>
                            </form>
                        </div>
                </div>
                <div class="tab-1"> <!-- Edit Recent Games -->
                    <h2 class="subtitle">Edit Recent Games</h2>
                        <div class="upload-img">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                <div>
                                    <p>Game 1 Thumbnail:</p>
                                    <input type="file" name="game-1" class="btn-color-1" required>
                                    <p>Title:</p>
                                    <input type="text" name="game-1-title" class="input-box" required>
                                </div>
                                <div>
                                    <input type="submit" name="game1-btn" value="Edit Game 1" class="btn btn-color-1">
                                </div>
                            </form>
                        </div>
                        <div class="upload-img">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                <div>
                                    <p>Game 2 Thumbnail:</p>
                                    <input type="file" name="game-2" class="btn-color-1" required>
                                    <p>Title:</p>
                                    <input type="text" name="game-2-title" class="input-box" required>
                                </div>
                                <div>
                                    <input type="submit" name="game2-btn" value="Edit Game 2" class="btn btn-color-1">
                                </div>
                            </form>
                        </div>
                        <div class="upload-img">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                <div>
                                    <p>Game 3 Thumbnail:</p>
                                    <input type="file" name="game-3" class="btn-color-1" required>
                                    <p>Title:</p>
                                    <input type="text" name="game-3-title" class="input-box" required>
                                </div>
                                <div>
                                    <input type="submit" name="game3-btn" value="Edit Game 3" class="btn btn-color-1">
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </section>
        <hr>

        <!-- Edit Commissions Section -->
        <section id="edit-comms">
            <h1 class="title">Edit Commission Info</h1>
            <div class="tab-container">
                <div class="tab-1">
                    <h2 class="subtitle">Edit Tier 1</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="exp-details">
                            <p>Feature 1:</p>
                            <input type="text" name="t1-f1" class="input-box" value="<?php echo $t1f1; ?>" required>
                        </div>
                        <div class="exp-details">
                            <p>Feature 2:</p>
                            <input type="text" name="t1-f2" class="input-box" value="<?php echo $t1f2; ?>" required>
                        </div>
                        <div class="exp-details">
                            <p>Feature 3:</p>
                            <input type="text" name="t1-f3" class="input-box" value="<?php echo $t1f3; ?>" required>
                        </div>
                        <div>
                            <input type="submit" name="tier1-btn" value="Edit Tier 1" class="btn btn-color-1">
                        </div>
                    </form>
                </div>
                <div class="tab-1">
                    <h2 class="subtitle">Edit Tier 2</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="exp-details">
                            <p>Feature 1:</p>
                            <input type="text" name="t2-f1" class="input-box" value="<?php echo $t2f1; ?>" required>
                        </div>
                        <div class="exp-details">
                            <p>Feature 2:</p>
                            <input type="text" name="t2-f2" class="input-box" value="<?php echo $t2f2; ?>" required>
                        </div>
                        <div class="exp-details">
                            <p>Feature 3:</p>
                            <input type="text" name="t2-f3" class="input-box" value="<?php echo $t2f3; ?>" required>
                        </div>
                        <div>
                            <input type="submit" name="tier2-btn" value="Edit Tier 2" class="btn btn-color-1">
                        </div>
                    </form>
                </div>
                <div class="tab-1">
                    <h2 class="subtitle">Edit Tier 3</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="exp-details">
                            <p>Feature 1:</p>
                            <input type="text" name="t3-f1" class="input-box" value="<?php echo $t3f1; ?>" required>
                        </div>
                        <div class="exp-details">
                            <p>Feature 2:</p>
                            <input type="text" name="t3-f2" class="input-box" value="<?php echo $t3f2; ?>" required>
                        </div>
                        <div class="exp-details">
                            <p>Feature 3:</p>
                            <input type="text" name="t3-f3" class="input-box" value="<?php echo $t3f3; ?>" required>
                        </div>
                        <div>
                            <input type="submit" name="tier3-btn" value="Edit Tier 3" class="btn btn-color-1">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <div id="admin-mobile">
        <h1>Oops..</h1>
        <p>Admin Portal is not available on Mobile. <br>Login on Desktop to access the Admin Portal.</p>
    </div>

</body>
</html>