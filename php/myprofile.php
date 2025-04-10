<!doctype html>
<!--
This is the My Profile Page.
-->
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Moodr - My Profile</title>
    <link rel="stylesheet" href="../css/myprofile.css">
</head>

<body>
    <?php
    session_start();
    include "connect.php";
    $loggedIn = false;

    // Checks if there is an Active Session
    if (isset($_SESSION["username"])) {
        $loggedIn = true;
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
            <div class="nav-links">
            <a href="index.php" class="nav">Dashboard</a>
                <a href="calendar.php" class="nav">Calendar</a>
                <a href="reviews.php" class="nav">Reviews</a>
                <?php // If admin, they will have a user management button.
                if ($loggedIn) {
                    if ($_SESSION["role"] === "admin") {
                        echo "<a href='usermanagment.php' class='nav'>User Managment</a>";
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
            <div id="profile-container">
                <div id="profile-left">
                    <?php if ($loggedIn): ?>
                        <img src="getPfp.php" id="profile-image">
                        <form id="pfp-form" action="uploadPfp.php" method="POST" enctype="multipart/form-data">
                            <label for="pfp-input" class="pfp-btn">Choose File</label>
                            <input type="file" name="pfp" id="pfp-input" accept="image/*">
                            <button type="submit" class="pfp-btn">Change Profile Picture</button>
                        </form>
                    <?php else: ?>
                        <div id="profile-image"></div>
                    <?php endif; ?>
                </div>

                <div id="profile-options">
                    <button class="profile-btn">Change Username</button>
                    <button class="profile-btn">Change Password</button>
                    <button class="profile-btn">Change Personal Info</button>
                    <button class="profile-btn-delete">Delete Profile</button>
                    <form id="bio-form" method="POST" action="updateBio.php">
                        <div id="bio-box">
                            <textarea id="bio-textarea" name="bio" placeholder="Write a short bio..."><?php
                                  echo isset($_SESSION['bio']) ? htmlspecialchars($_SESSION['bio']) : '';
                                  ?></textarea>
                            <button type="submit" id="save-bio-btn">Save Bio</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</body>

</html>