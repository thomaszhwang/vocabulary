<?PHP
require_once("./include/user_config.php");
if(!$u->isLoggedIn()) {
    $u->redirectToURL("login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Vocabulary GoBanana Today!</title>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"
            charset="utf-8"></script>
        <script src="main.js" charset="utf-8"></script>
    </head>
    <body>
        <div id="nav_left" class="nav_top">
            <ul>
                <li><a href="#">New Vocabulary</a></li>
                <li><a href="#">Statistics</a></li>
            </ul>
        </div>
    
        <div id="nav_right" class="nav_top">
            <ul>
                <li><a href="logout.php"><?PHP echo $_SESSION['user_display_name']; ?></a></li>
                <li><a href="#">About</a></li>
            </ul>
        </div>
    
        <div id="count-box">
            <li id="progress_correct_count"></li>
            <li id="progress_wrong_count"></li>
        </div>
        
        <div id="word_display_div">
            <span id="word_display_span"></span>
            <a id="dictionary_link" target="_blank"><span id="dictionary">dictionary.com<span></a>
        </div>
    
        <div id="button_group">
            <div id="check_button" class="check_button">✔</div>
            <div id="cross_button" class="check_button">✗</div>
        </div>
    </body>
</html>
