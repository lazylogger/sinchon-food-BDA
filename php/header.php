<?php
    session_start();
    if (isset($_SESSION["useremail"])) {
        $useremail = $_SESSION["useremail"];
        include $_SERVER["DOCUMENT_ROOT"]."/config.php";   // absolute path of config.php
        $con = mysqli_connect($host, $username, $password, $database);   // imported variables in config.php
        $sql = "SELECT point FROM User WHERE email='$useremail'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $userpoint = isset($row) ? $row["point"] : 0;
    }
    else $useremail = "";
    if (isset($_SESSION["usernickname"]))
        $usernickname = $_SESSION["usernickname"];
    else $usernickname = "";
?>
        <div id="header_content">
            <h2>
                <a href="http://localhost/index.php">Sinchon Food BDA</a>
            </h2>
            <p id="header_button">
<?php
    if(!$useremail) {
?>                
                <span><a href="http://localhost/php/user/create_user_html.php">Sign Up</a> </span>
                <span> | </span>
                <span><a href="http://localhost/php/user/signin_user_html.php">Sign In</a></span>
<?php
    } else {
                $logged = "Hi, ".$usernickname."! [Point:".$userpoint."]";
?>
                <span><?=$logged?> </span>
                <span> | </span>
                <span><a href="http://localhost/php/user/signout_user.php">Sign Out</a> </span>
                <span> | </span>
                <span><a href="http://localhost/php/user/modify_user_html.php">Modify Personal Info</a></span>
<?php
    }
?>
            </p>
        </div>
        <div id="menu_bar">
            <div class="menu_div">
                <div><a href="http://localhost/index.php">Recent Activity</a></div>
                <div><a href="http://localhost/php/search/search_html.php">Search</a></div>                                
                <div><a href="http://localhost/php/analysis/list_analysis_html.php">Analysis</a></div>
                <div><a href="http://localhost/php/review/list_review_html.php">Reviews</a></div>
            </div>
        </div>