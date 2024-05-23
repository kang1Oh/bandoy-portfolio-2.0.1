<?php
    require_once 'dbConfig.php'; 

    //Initialization: Fetching data from mysql database
        //About Me 
            //Experience
                $sql1 = "SELECT xp_in_years, experience_desc FROM experience WHERE id = 1";
                $sql2 = "SELECT xp_in_years, experience_desc FROM experience WHERE id = 2";
                $exp1 = $conn->query($sql1);
                $exp2 = $conn->query($sql2);

                if ($exp1->num_rows > 0) {
                    $row = $exp1->fetch_assoc();

                    $xp_yrs1 = $row["xp_in_years"];
                    $xp_dsc1 = $row["experience_desc"];
                } else {
                    $xp_yrs1 = $xp_dsc1 = "";
                }
                if ($exp2->num_rows > 0) {
                    $row = $exp2->fetch_assoc();
        
                    $xp_yrs2 = $row["xp_in_years"];
                    $xp_dsc2 = $row["experience_desc"];
                } else {
                    $xp_yrs2 = $xp_dsc2 = "";
                }

            //About Me Paragraph
                $about_sql = "SELECT about_description FROM about WHERE id = 1";
                $sql_exec = $conn->query($about_sql);
                if ($sql_exec->num_rows > 0) {
                    $row = $sql_exec->fetch_assoc();

                    $abt_desc = $row["about_description"];
                } else {
                    $abt_desc = "";
                }
        //Projects
            //Recent Art
                $sqla1 = "SELECT image, image_title FROM recent_art WHERE id = 1";
                $sqla2 = "SELECT image, image_title FROM recent_art WHERE id = 2";
                $sqla3 = "SELECT image, image_title FROM recent_art WHERE id = 3";
                $resa1 = $conn->query($sqla1);
                $resa2 = $conn->query($sqla2);
                $resa3 = $conn->query($sqla3);

                if ($resa1->num_rows > 0) {
                    $row = $resa1->fetch_assoc();

                    $a1_img = $row["image"];
                    $a1_title = $row["image_title"];
                } else {
                    $a1_img = $a1_title = "";
                }
                if ($resa2->num_rows > 0) {
                    $row = $resa2->fetch_assoc();

                    $a2_img = $row["image"];
                    $a2_title = $row["image_title"];
                } else {
                    $a2_img = $a2_title = "";
                }
                if ($resa3->num_rows > 0) {
                    $row = $resa3->fetch_assoc();

                    $a3_img = $row["image"];
                    $a3_title = $row["image_title"];
                } else {
                    $a3_img = $a3_title = "";
                }
            //Recent Code
                $sqlc1 = "SELECT image, image_title FROM recent_code WHERE id = 1";
                $sqlc2 = "SELECT image, image_title FROM recent_code WHERE id = 2";
                $sqlc3 = "SELECT image, image_title FROM recent_code WHERE id = 3";
                $resc1 = $conn->query($sqlc1);
                $resc2 = $conn->query($sqlc2);
                $resc3 = $conn->query($sqlc3);

                if ($resc1->num_rows > 0) {
                    $row = $resc1->fetch_assoc();

                    $c1_img = $row["image"];
                    $c1_title = $row["image_title"];
                } else {
                    $c1_img = $c1_title = "";
                }
                if ($resc2->num_rows > 0) {
                    $row = $resc2->fetch_assoc();

                    $c2_img = $row["image"];
                    $c2_title = $row["image_title"];
                } else {
                    $c2_img = $c2_title = "";
                }
                if ($resc3->num_rows > 0) {
                    $row = $resc3->fetch_assoc();

                    $c3_img = $row["image"];
                    $c3_title = $row["image_title"];
                } else {
                    $c3_img = $c3_title = "";
                }
            //Recent Games
                $sqlg1 = "SELECT image, image_title FROM recent_game WHERE id = 1";
                $sqlg2 = "SELECT image, image_title FROM recent_game WHERE id = 2";
                $sqlg3 = "SELECT image, image_title FROM recent_game WHERE id = 3";
                $resg1 = $conn->query($sqlg1);
                $resg2 = $conn->query($sqlg2);
                $resg3 = $conn->query($sqlg3);

                if ($resg1->num_rows > 0) {
                    $row = $resg1->fetch_assoc();

                    $g1_img = $row["image"];
                    $g1_title = $row["image_title"];
                } else {
                    $g1_img = $g1_title = "";
                }
                if ($resg2->num_rows > 0) {
                    $row = $resg2->fetch_assoc();

                    $g2_img = $row["image"];
                    $g2_title = $row["image_title"];
                } else {
                    $g2_img = $g2_title = "";
                }
                if ($resg3->num_rows > 0) {
                    $row = $resg3->fetch_assoc();

                    $g3_img = $row["image"];
                    $g3_title = $row["image_title"];
                } else {
                    $g3_img = $g3_title = "";
                }
        //Commissions
            $sqlcomm1 = "SELECT feature_one, feature_two, feature_three FROM commissions WHERE id = 1";
            $sqlcomm2 = "SELECT feature_one, feature_two, feature_three FROM commissions WHERE id = 2";
            $sqlcomm3 = "SELECT feature_one, feature_two, feature_three FROM commissions WHERE id = 3";
            $tier1 = $conn->query($sqlcomm1);
            $tier2 = $conn->query($sqlcomm2);
            $tier3 = $conn->query($sqlcomm3);
            
            //TIER 1
            if ($tier1->num_rows > 0) {
                $row = $tier1->fetch_assoc();

                $t1f1 = $row["feature_one"];
                $t1f2 = $row["feature_two"];
                $t1f3 = $row["feature_three"];
            } else {
                $t1f1 = $t1f2 = $t1f3 = "";
            }
            //TIER 2
            if ($tier2->num_rows > 0) {
                $row = $tier2->fetch_assoc();

                $t2f1 = $row["feature_one"];
                $t2f2 = $row["feature_two"];
                $t2f3 = $row["feature_three"];
            } else {
                $t2f1 = $t2f2 = $t2f3 = "";
            }
            //TIER 3
            if ($tier3->num_rows > 0) {
                $row = $tier3->fetch_assoc();

                $t3f1 = $row["feature_one"];
                $t3f2 = $row["feature_two"];
                $t3f3 = $row["feature_three"];
            } else {
                $t3f1 = $t3f2 = $t3f3 = "";
            }
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
            <h1 onclick="location.href='index.php'">JAROMOB</h1>
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
            <h1 onclick="location.href='index.php'">JAROMOB</h1>
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
        <img src="./assets/up.png" alt="arrow up" class="icon arrow-up" onclick="location.href='index.php#desktop-nav'">
        <h1 class="title">About Me</h1>
        <div class="section-container">
            <!-- about me picture -->
            <div class="section_pic-container">
                <img src="./assets/about-image.png" alt="JAROMOB profile picture" class="about-pic">
            </div>
            <!-- about me details -->
            <div class="about-details-container">
                <!-- art and coding exp container -->
                <div class="about-containers">
                    <!-- art exp container -->
                    <div class="details-container">
                        <img src="./assets/about-art.png" alt="Art Experience Icon" class="icon">
                        <h3 class="subtitle">Art Experience</h3>
                        <p><?php echo $xp_yrs1; ?> years<br><?php echo $xp_dsc1; ?></p>
                    </div>
                    <!-- programming exp container -->
                    <div class="details-container">
                        <img src="./assets/about-coding.png" alt="Programming Experience Icon" class="icon">
                        <h3 class="subtitle">Coding Experience</h3>
                        <p><?php echo $xp_yrs2; ?> years <br><?php echo $xp_dsc2; ?></p>
                    </div>
                </div>
                
                <!-- about me text -->
                <div class="text-container">
                    <p><?php echo $abt_desc; ?></p>
                </div> <!-- end of about me text -->
            </div> <!-- end of about me details -->
        </div>
        <img src="./assets/down.png" alt="arrow down" class="icon arrow-down" onclick="location.href='index.php#projects'">
    </section> <!-- End of About Me Section -->
    
    <!-- Projects Section -->
    <section id="projects">
        <img src="./assets/up.png" alt="arrow up" class="icon arrow-up" onclick="location.href='index.php#about'">
        <h1 class="title">Recent Works</h1>
        <div class="project-details-container"> 
            <div class="details-container"> <!-- IN ART -->
                <h2 class="subtitle">IN ART</h2>
                <div class="articles">
                    <div class="article-container">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($a1_img); ?>" alt="Latest Artwork" class="project-img">
                        <p class="project-title"><?php echo $a1_title; ?></p>
                    </div>
                    <div class="article-container">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($a2_img); ?>" alt="Latest Artwork" class="project-img">
                        <p class="project-title"><?php echo $a2_title; ?></p>
                    </div>
                    <div class="article-container">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($a3_img); ?>" alt="Latest Artwork" class="project-img">
                        <p class="project-title"><?php echo $a3_title; ?></p>
                    </div>
                </div>
                <div class="btn-container">
                    <button class="btn btn-color-1"  onclick="window.open('https://www.artstation.com/jaromob')">More In ArtStation</button>
                </div>
            </div>
            <div class="details-container"> <!-- IN PROGRAMMING -->
                <h2 class="subtitle">IN PROGRAMMING</h2>
                <div class="articles">
                    <div class="article-container">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($c1_img); ?>" alt="Latest Program" class="project-img">
                        <p class="project-title"><?php echo $c1_title; ?></p>
                    </div>
                    <div class="article-container">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($c2_img); ?>" alt="Latest Program" class="project-img">
                        <p class="project-title"><?php echo $c2_title; ?></p>
                    </div>
                    <div class="article-container">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($c3_img); ?>" alt="Latest Program" class="project-img">
                        <p class="project-title"><?php echo $c3_title; ?></p>
                    </div>
                </div>
                <div class="btn-container">
                    <button class="btn btn-color-1"  onclick="window.open('https://github.com/kang1Oh')">More In GitHub</button>
                </div>
            </div>
            <div class="details-container"> <!-- IN PROGRAMMING -->
                <h2 class="subtitle">IN GAME DEVELOPMENT</h2>
                <div class="articles">
                    <div class="article-container">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($g1_img); ?>" alt="Latest Game" class="project-img">
                        <p class="project-title"><?php echo $g1_title; ?></p>
                    </div>
                    <div class="article-container">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($g2_img); ?>" alt="Latest Game" class="project-img">
                        <p class="project-title"><?php echo $g2_title; ?></p>
                    </div>
                    <div class="article-container">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($g3_img); ?>" alt="Latest Game" class="project-img">
                        <p class="project-title"><?php echo $g3_title; ?></p>
                    </div>
                </div>
                <div class="btn-container">
                    <button class="btn btn-color-1"  onclick="window.open('https://jaromob.itch.io/')">More In Itch.io</button>
                </div>
            </div>
        </div>
        <img src="./assets/down.png" alt="arrow down" class="icon arrow-down" onclick="location.href='index.php#commissions'">
    </section><!-- End of Projects Section -->

    <!-- Commissions Section -->
    <section id="commissions">
        <img src="./assets/up.png" alt="arrow up" class="icon arrow-up" onclick="location.href='index.php#projects'">
        <h1 class="title">Commission Me</h1>
        <div class="comms-details-container">
            <div class="about-containers">
                <div class="details-container"> <!-- TIER 1 -->
                    <h2 class="subtitle">Tier 1</h2>
                    <div class="article-container">
                        <article>
                            <img src="./assets/star.png" alt="star icon" class="icon">
                            <div>
                                <p><?php echo $t1f1; ?></p>
                            </div>
                        </article>
                        <article>
                            <img src="./assets/star.png" alt="star icon" class="icon">
                            <div>
                                <p><?php echo $t1f2; ?></p>
                            </div>
                        </article>
                        <article>
                            <img src="./assets/star.png" alt="star icon" class="icon">
                            <div>
                                <p><?php echo $t1f3; ?></p>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="details-container"> <!-- TIER 2 -->
                    <h2 class="subtitle">Tier 2</h2>
                    <div class="article-container">
                        <article>
                            <img src="./assets/star.png" alt="star icon" class="icon">
                            <div>
                                <p><?php echo $t2f1; ?></p>
                            </div>
                        </article>
                        <article>
                            <img src="./assets/star.png" alt="star icon" class="icon">
                            <div>
                                <p><?php echo $t2f2; ?></p>
                            </div>
                        </article>
                        <article>
                            <img src="./assets/star.png" alt="star icon" class="icon">
                            <div>
                                <p><?php echo $t2f3; ?></p>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="details-container"> <!-- TIER 3 -->
                    <h2 class="subtitle">Tier 3</h2>
                    <div class="article-container">
                        <article>
                            <img src="./assets/star.png" alt="star icon" class="icon">
                            <div>
                                <p><?php echo $t3f1; ?></p>
                            </div>
                        </article>
                        <article>
                            <img src="./assets/star.png" alt="star icon" class="icon">
                            <div>
                                <p><?php echo $t3f2; ?></p>
                            </div>
                        </article>
                        <article>
                            <img src="./assets/star.png" alt="star icon" class="icon">
                            <div>
                                <p><?php echo $t3f3; ?></p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-container">
            <button class="btn btn-color-1"  onclick="window.open('https://forms.gle/NXj5ycnFXw59zWf77')">See Form</button>
        </div>
        <img src="./assets/down.png" alt="arrow down" class="icon arrow-down" onclick="location.href='index.php#contact'">
    </section> <!-- End of Commissions Section -->

    <!-- Contact Section -->
    <section id="contact">
        <img src="./assets/up.png" alt="arrow up" class="icon arrow-up" onclick="location.href='index.php#commissions'">
        <h1 class="title">Send Me a Message</h1>
            <div class="contact-info-container">
                
                <form class="contact-form" id="contact-form" action="https://api.web3forms.com/submit" method="POST">
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
                            <input type="email" class="input-box" name="email" required/> <br>
                        </div>
                        <div class="input-container">
                            <p>Message Subject</p>
                            <input type="text" class="input-box" name="subject"  required/> <br>
                        </div>
                        <div class="input-container">
                            <p>Your Message</p>
                            <textarea class="input-box" name="message" rows="8" required></textarea>
                        </div>

                        <div class="input-container">
                            <p></p>
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
    <!-- Script to ensure captcha response-->
    <script>
        const form = document.getElementById('contact-form');

        form.addEventListener('submit', function(e) {

            const hCaptcha = form.querySelector('textarea[name=h-captcha-response]').value;

            if (!hCaptcha) {
                e.preventDefault();
                alert("Please fill out captcha field")
                return
            }
        });
    </script>
</body>
</html>