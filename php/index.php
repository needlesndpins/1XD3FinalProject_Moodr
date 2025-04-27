<?php 
/**
 * Author: Team 18, CSS Ninjas
 * Created: March, 2025
 * Submitted: April 26th, 2025
 * Description: php file for 1XD3, Final Delivery.
 * This is the splash page which users will first be greeted with. It holds announcements
 * and important information about the club.
 */
session_start();
error_reporting(0);

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Moodr</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/hamburger.css">
    <script src="../js/nav.js"></script>
    <?php
    
    // if user is logged in then apply their style
    if(isset($_SESSION["username"])){
        if($_SESSION["role"]==="admin"){
            echo "<script src='../js/indexStyleAdmin.js'></script>";
            echo "<script src='../js/indexStyleRefresher.js'></script>";
            echo "<script src='../js/scrollIndexAdmin.js'></script>";
            echo "<script src='../js/postListenerAdmin.js'></script>";
        }else{
            echo "<script src='../js/indexStyle.js'></script>";
            echo "<script src='../js/scrollIndex.js'></script>";
        }
    }else{ 
        echo "<script src='../js/scrollIndex.js'></script>";
    }
    
    ?>
</head>

<body>
    <?php
    include "connect.php";
    $loggedIn = false;

    // Checks if there is an Active Session
    if (isset($_SESSION["username"])) {
        $loggedIn = true;
        include "statusCheck.php";
        status_check($_SESSION["username"], $_SESSION["role"]); // Check users status
    }
    ?>
    <div id="container">
        <div id="header">

            <p id="moodr">M o o d r
                <?php
                if ($loggedIn) {
                    if ($_SESSION["role"] === "admin") {
                        echo " A d m i n";
                    }
                }
                ?>
            </p>
            <!-- Hamburger nav -->
            <div id="hamburger">
                <img src="../images/hamburger.png">
                <div id="hamburger-content">
                    <a href="index.php" class="nav">Dashboard</a>
                    <a href="calendar.php" class="nav">Calendar</a>
                    <a href="reviews.php" class="nav">Reviews</a>
                    <?php // If admin, they will have a user management button.
                    if ($loggedIn) {
                        if ($_SESSION["role"] === "admin") {
                            echo "<a href='usermanagment.php' class='nav'>Administration</a>";
                        }
                    }
                    if (!$loggedIn) {
                        echo "<a href='login.php' class='nav'>Log in</a>";
                    } else {
                        echo "<a href='myprofile.php' class='nav'>My Profile</a>";
                        echo "<a href='logouthandler.php' class='nav'>Log out</a>";
                    }
                    ?>
                </div>

            </div>
            <div class="nav-links">
                <a href="index.php" class="nav">Dashboard</a>
                <a href="calendar.php" class="nav">Calendar</a>
                <a href="reviews.php" class="nav">Reviews</a>
                <?php // If admin, they will have a user management button.
                if ($loggedIn) {
                    if ($_SESSION["role"] === "admin") {
                        echo "<a href='usermanagment.php' class='nav'>Administration</a>";
                    }
                }
                if (!$loggedIn) {
                    echo "<a href='login.php' class='nav'>Log in</a>";
                } else {
                    echo "<a href='myprofile.php' class='nav'>My Profile</a>";
                    echo "<a href='logouthandler.php' class='nav'>Log out</a>";
                }
                ?>

            </div>

        </div>
        <div id="content">
            <div id="user-intro">
                <?php
                if (isset($_SESSION['username'])) {
                    ?>
                    <h1>Welcome <?= $_SESSION['username'] ?>!</h1>
                    <p>What are some of your favourite albums?</p>
                    <?php
                } else {
                    echo "<h1>Welcome to Mood FM!</h1>";
                    echo "<p>What's on the agenda for today?</p>";
                }
                ?>
            </div>
            <div id="about-us">
                <h1>About Us</h1>
                <p>Mac's very own music listening community! Join us for weekly listening parties, album discussions,
                    record store runs, concert outings, and more!</p>

                <p>Want to make an <i>Album Suggestion</i>? <a
                        href="https://docs.google.com/forms/u/0/d/e/1FAIpQLSeAWZ3hKneWsGEg7usLBhnX5lvzuHhFQyhzgqokE-0nKnnSUA/viewform?pli=1"
                        target="_blank">Click
                        Here!</a></p>

                <div id="social-icons">
                    <a href = "https://www.instagram.com/macmoodfm/" target = "_blank"><img src = "../images/insta_icon.png" width = "20" height = "20"></a>
                    <a href = "https://discord.gg/8crcQw9n" target = "_blank"><img src = "../images/discord_icon.png" width = "20" height = "20"></a>
                </div>
            </div>

            <?php // If admin, they can post.
            if ($loggedIn) {
                if ($_SESSION["role"] === "admin") {
                    ?>
                    <div id="make-post">
                        <h1>Make a Post</h1>
                        <div class="make-post-container">

                            <form id="make-post-form" action="posthandler.php" method="POST">
                                <label for="post-title">Title:</label>
                                <input type="text" id="post-title" name="post-title" placeholder="Enter post title... (30 Chars max)"
                                maxlength = "30" required>
                                <label for="post-message">Message:</label>
                                <textarea id="post-message" name="post-message" placeholder="Enter your message..." rows="5"
                                    required></textarea>
                                <button id="submit" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>


            <div id="announcments">
                <h1>Latest Announcements</h1>
                <div id="posts">
                    <!-- <div id = 1 class = "post"> 
                        <div class = "post-pfp"> 
                            <img src = "../ProfileImgs/defaultpfp.jpg">
                         </div>
                         <div class="textbox">
                                <div class="post-title">
                                    <p><b>Kiwi - Title here 
                                        <span class='timestamp'>2025-04-26 12:50:25</span></b></p>
                                </div>
                                <div class="post-text">
                                    <p>This is the post text</p>
                                </div>
                            </div>
                            <div class="trash-icon" id="<?= $row["postId"] ?>">
                                    <img src="../images/trashicon.png" width="20px" height="20px">
                            </div>
                    </div> -->
                    
                    <?php
                    include "imageHandler.php"; // Using get_pfp_path()
                    
                    // Get the latest announcements from the database
                    $cmd = "SELECT * FROM announcements ORDER BY date DESC LIMIT 5";
                    $stmt = $dbh->prepare($cmd);
                    $success = $stmt->execute();
                    if (!$success) {
                        echo "Error: Failed to retrieve announcements from database.";
                    }

                    $rendered_posts = []; // Keep track of post ids that have been rendered
                    
                    while ($row = $stmt->fetch()) {
                        array_push($rendered_posts, $row["postId"]); // Push postID to array

                        $_SESSION["post_date"] = $row["date"]; // Ensure get last date

                        echo "<div id = '$row[postId]' class = 'post'>";
                            $pfp_path = get_pfp_path($row["username"]);
                            echo "<div class = 'post-pfp'>";
                            if (file_exists($pfp_path)) {
                                echo "<img src = $pfp_path>"; // pfp exists in directory
                            } else {
                                echo "<img src = '../images/defaultpfp.jpg'>"; // Default pfp
                            }
                            echo "</div>";
                            ?>
                            <div class="textbox">
                                <div class="post-title">
                                    <p><b><?= $row["username"] ?> - <?= $row["title"] ?> <span
                                                class='timestamp'><?= $row["date"] ?></span></b></p>
                                </div>
                                <div class="post-text">
                                    <p><?= $row["message"] ?></p>
                                </div>
                            </div>
                            <?php // If admin, they delete posts.
                                if ($_SESSION["role"] === "admin") {
                                    ?>
                                <div class="trash-icon" id="<?= $row["postId"] ?>">
                                    <img src="../images/trashicon.png" width="20px" height="20px">
                                </div>
                                <?php
                                }
                                // $_SESSION["rendered_posts"] = $rendered_posts; // Store rendered post ID's in session storage
                                ?>

                        </div>
                        
                    <?php 
                        } 
                        $_SESSION["rendered_posts"] = $rendered_posts; 
                    
                    ?>
                </div>
            </div>
        </div>
        <div id="footer"> </div>
    </div>

</body>

</html>