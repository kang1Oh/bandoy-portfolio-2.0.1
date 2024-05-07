<?php
//CHANGE VARIABLE NAMES WHEN DEPLOYING TO INFINITYFREE
$servername = "localhost"; //CHANGE THIS
$username = "root"; //CHANGE THIS
$password = ""; //CHANGE THIS
$dbname = "jrmb_portfolio_db"; //CHANGE THIS

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Processing CONTACT ME form data when form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {


//     //DB INSERTION SECTION
//         // Prepare an insert statement
//         $sql = "INSERT INTO messages (message_from, email, subject, message) VALUES (?, ?, ?, ?)";

//         if ($stmt = mysqli_prepare($conn, $sql)) {
//             // Bind variables to the prepared statement as parameters 
//             mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_email, $param_subject, $param_message);
//             //prepared statement and parameter binding sanitizes input data and prevents sql injection attacks

//             // Set variables with user input values
//             $param_name = $_POST["name"];
//             $param_email = $_POST["email"];
//             $param_subject = $_POST["subject"];
//             $param_message = $_POST["message"];

//             // Attempt to execute the prepared statement
//             if (mysqli_stmt_execute($stmt)) {
//                 // Redirect to login page after successful registration
//                 header("location: index.php");
//             } else {
//                 echo "Something went wrong. Please try again later.";
//             }

//             // Close statement
//             mysqli_stmt_close($stmt);
//         }
    

//     // Close connection
//     mysqli_close($conn);
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAROMOB | Portfolio</title>
    <link rel="icon" type="image/x-icon" href="assets/jaromob-icon.svg">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="mediaqueries.css">
</head>
<body>
    <!-- Desktop Navigation -->
    <nav id="desktop-nav">
        <div class="logo">
            <h1 onclick="location.href='index.html'">JAROMOB</h1>
        </div>
        <div>
            <ul class="nav-links">
                <li><a href="#about">About</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#commissions">Commissions</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </nav> <!-- End of Desktop Navigation -->
    
    <!-- Mobile Navigation -->
    <nav id="hamburger-nav">
        <div class="logo">
            <h1>JAROMOB</h1>
        </div>
        <div class="hamburger-menu">
            <div class="hamburger-icon" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="menu-links">
                <li><a href="#about" onclick="togglseMenu()">About</a></li>
                <li><a href="#projects" onclick="toggleMenu()">Projects</a></li>
                <li><a href="#commissions" onclick="toggleMenu()">Commissions</a></li>
                <li><a href="#contact" onclick="toggleMenu()">Contact</a></li>
            </div>
        </div>
    </nav> <!-- End of Mobile Navigation -->

    <!-- Profile/Hero Section -->
    <section id="profile">
        <!-- header-section pic container -->
        <div class="section_pic-container">
            <img src="./assets/profile-pic-round.png" alt="JAROMOB profile picture">
        </div>
        
        <!-- header-section text container -->
        <div class="section_text">
            <!-- text introduction -->
            <p class="section_text_p1">Testing, testing.. This is</p>
            <img src="./assets/jaromob-title.png" alt="JAROMOB Title" id="jaromob-title">
            <p class="section_text_p2">Artist and Programmer</p>

            <!-- download cv button -->
            <div class="btn-container">
                <button class="btn btn-color-1"  onclick="window.open('assets/jaromob-cv.pdf')">Download CV</button>
            </div>

            <!-- socials container -->
            <div id="socials-container">
                <img src="./assets/artstation.svg" alt="ArtStation Link" class="icon" onclick="location.href='https://www.artstation.com/jaromob'">
                <img src="./assets/github-desktop.svg" alt="GitHub Link" class="icon" onclick="location.href='https://github.com/kang1Oh'">
                <img src="./assets/itch-io.svg" alt="Itch.io Link" class="icon" onclick="location.href='https://jaromob.itch.io/'">
            </div>
        </div>
    </section> <!-- End of Hero Section -->

    <!-- About Section -->
    <section id="about">
        <img src="./assets/up.png" alt="arrow up" class="icon arrow-up" onclick="location.href='./#desktop-nav'">
        <h1 class="title">About Me</h1>
        <div class="section-container">
            <!-- about me picture -->
            <div class="section_pic-container">
                <img src="./assets/profile-pic-square.png" alt="JAROMOB profile picture" class="about-pic">
            </div>
            <!-- about me details -->
            <div class="about-details-container">
                <!-- art and coding exp container -->
                <div class="about-containers">
                    <!-- art exp container -->
                    <div class="details-container">
                        <img src="./assets/about-art.png" alt="Art Experience Icon" class="icon">
                        <h3 class="subtitle">Art Experience</h3>
                        <p>6+ years <br>Digital and Traditional Drawing</p>
                    </div>
                    <!-- programming exp container -->
                    <div class="details-container">
                        <img src="./assets/about-coding.png" alt="Programming Experience Icon" class="icon">
                        <h3 class="subtitle">Coding Experience</h3>
                        <p>3+ years <br>Java Programming Expertise</p>
                    </div>
                </div>
                <!-- about me text -->
                <div class="text-container">
                    <p>My love for animation, nurtured since childhood, led me to pursue ICT in senior high school, primarily because it offered courses in animation. Little did I know that this decision would open doors to the world of programming, which quickly became a new passion of mine. It's amazing how one interest can drastically change one's career path.
                    </p>
                </div> <!-- end of about me text -->
            </div> <!-- end of about me details -->
        </div>
        <img src="./assets/down.png" alt="arrow down" class="icon arrow-down" onclick="location.href='./#projects'">
    </section> <!-- End of About Me Section -->
    
    <!-- Projects Section -->
    <section id="projects">
        <img src="./assets/up.png" alt="arrow up" class="icon arrow-up" onclick="location.href='./#about'">
        <h1 class="title">Recent Works</h1>
        <div class="project-details-container"> 
            <div class="details-container">
                <h2 class="subtitle">IN ART</h2>
                <div class="articles">
                    <div class="article-container">
                        <img src="./assets/artwork-1.png" alt="Latest Artwork" class="project-img">
                        <p class="project-title">Sept. 17, 2023</p>
                    </div>
                    <div class="article-container">
                        <img src="./assets/artwork-2.png" alt="Latest Artwork" class="project-img">
                        <p class="project-title">July. 16, 2023</p>
                    </div>
                    <div class="article-container">
                        <img src="./assets/artwork-3.png" alt="Latest Artwork" class="project-img">
                        <p class="project-title">July 9, 2023</p>
                    </div>
                </div>
                <div class="btn-container">
                    <button class="btn btn-color-1"  onclick="window.open('https://www.artstation.com/jaromob')">More In ArtStation</button>
                </div>
            </div>
            <div class="details-container">
                <h2 class="subtitle">IN PROGRAMMING</h2>
                <div class="articles">
                    <div class="article-container">
                        <img src="./assets/program-1.png" alt="Latest Artwork" class="project-img">
                        <p class="project-title">KRADJ Express</p>
                    </div>
                    <div class="article-container">
                        <img src="./assets/program-2.png" alt="Latest Artwork" class="project-img">
                        <p class="project-title">HomeForest</p>
                    </div>
                    <div class="article-container">
                        <img src="./assets/program-3.png" alt="Latest Artwork" class="project-img">
                        <p class="project-title">The Proverbs App</p>
                    </div>
                </div>
                <div class="btn-container">
                    <button class="btn btn-color-1"  onclick="window.open('https://github.com/kang1Oh')">More In GitHub</button>
                </div>
            </div>
            <div class="details-container">
                <h2 class="subtitle">IN GAME DEVELOPMENT</h2>
                <div class="articles">
                    <div class="article-container">
                        <img src="./assets/games-coming-soon.png" alt="Latest Artwork" class="project-img">
                        <p class="project-title">COMING SOON</p>
                    </div>
                    <div class="article-container">
                        <img src="./assets/games-coming-soon.png" alt="Latest Artwork" class="project-img">
                        <p class="project-title">COMING SOON</p>
                    </div>
                    <div class="article-container">
                        <img src="./assets/games-coming-soon.png" alt="Latest Artwork" class="project-img">
                        <p class="project-title">COMING SOON</p>
                    </div>
                </div>
                <div class="btn-container">
                    <button class="btn btn-color-1"  onclick="window.open('https://jaromob.itch.io/')">More In Itch.io</button>
                </div>
            </div>
        </div>
        <img src="./assets/down.png" alt="arrow down" class="icon arrow-down" onclick="location.href='./#commissions'">
    </section><!-- End of Projects Section -->

    <!-- Commissions Section -->
    <section id="commissions">
        <img src="./assets/up.png" alt="arrow up" class="icon arrow-up" onclick="location.href='./#projects'">
        <h1 class="title">Commission Me</h1>
        <div class="comms-details-container">
            <div class="about-containers">
                <div class="details-container">
                    <h2 class="subtitle">Tier 1</h2>
                    <div class="article-container">
                        <article>
                            <img src="./assets/star.png" alt="star icon" class="icon">
                            <div>
                                <p>01:01 Aspect Ratio</p>
                            </div>
                        </article>
                        <article>
                            <img src="./assets/star.png" alt="star icon" class="icon">
                            <div>
                                <p>Simplistic Color Style</p>
                            </div>
                        </article>
                        <article>
                            <img src="./assets/star.png" alt="star icon" class="icon">
                            <div>
                                <p>For SNS Profile Photos and Mini Vers. (Chibis)</p>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="details-container">
                    <h2 class="subtitle">Tier 2</h2>
                    <div class="article-container">
                        <article>
                            <img src="./assets/star.png" alt="star icon" class="icon">
                            <div>
                                <p>03:04 Aspect Ratio</p>
                            </div>
                        </article>
                        <article>
                            <img src="./assets/star.png" alt="star icon" class="icon">
                            <div>
                                <p>Detailed Color Style</p>
                            </div>
                        </article>
                        <article>
                            <img src="./assets/star.png" alt="star icon" class="icon">
                            <div>
                                <p>For Character Illustrations and Comics</p>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="details-container">
                    <h2 class="subtitle">Tier 3</h2>
                    <div class="article-container">
                        <article>
                            <img src="./assets/star.png" alt="star icon" class="icon">
                            <div>
                                <p>16:9 Aspect Ratio</p>
                            </div>
                        </article>
                        <article>
                            <img src="./assets/star.png" alt="star icon" class="icon">
                            <div>
                                <p>Detailed and Structured Style</p>
                            </div>
                        </article>
                        <article>
                            <img src="./assets/star.png" alt="star icon" class="icon">
                            <div>
                                <p>For Illustration with Background Focus</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-container">
            <button class="btn btn-color-1"  onclick="window.open('https://forms.gle/NXj5ycnFXw59zWf77')">See Form</button>
        </div>
        <img src="./assets/down.png" alt="arrow down" class="icon arrow-down" onclick="location.href='./#contact'">
    </section> <!-- End of Commissions Section -->

    <!-- Contact Section -->
    <section id="contact">
        <img src="./assets/up.png" alt="arrow up" class="icon arrow-up" onclick="location.href='./#commissions'">
        <h1 class="title">Send Me a Message</h1>
            <div class="contact-info-container">
                <form class="contact-form" action="https://api.web3forms.com/submit" method="POST">
                    <div class="contact-details">

                        <!-- CONTACT ME API customization -->
                        <input type="hidden" name="access_key" value="3ad8ac47-931b-4aa8-b96c-15df7e8b2ad1">
                        <input type="hidden" name="from_name" value="JAROMOB">
                        <input type="hidden" name="replyto" value="email">


                        <div class="input-container">
                            <p>Your Name</p>
                            <input type="text" class="input-box" name="name" required/> <br>
                        </div>
                        <div class="input-container">
                            <p>Your Email</p>
                            <input type="text" class="input-box" name="email" required/> <br>
                        </div>
                        <div class="input-container">
                            <p>Message Subject</p>
                            <input type="text" class="input-box" name="subject"  required/> <br>
                        </div>
                        <div class="input-container">
                            <p>Your Message</p>
                            <textarea class="input-box" name="message" rows="8" required></textarea>
                        </div>

                        <div class="captcha">
                            <div class="h-captcha" data-captcha="true"></div>
                        </div>

                        <div class="btn-container">
                            <button type="submit" class="btn btn-color-1">Send Message</button>
                        </div>

                    </div>    
                </form>
            </div>         
    </section> <!-- End of Contact Section -->

    <footer>
        <p>Copyright © JAROMOB 2023-2024. All Rights Reserved. | Thank you for visiting the website!</p>
    </footer>
    <script src="https://web3forms.com/client/script.js" async defer></script>
    <script src="script.js"></script>
</body>
</html>