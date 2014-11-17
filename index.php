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
        <script src="js/main.js" charset="utf-8"></script>
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
        <link type="text/css" rel="stylesheet" href="css/new_vocabulary.css"/>
    </head>
    <body>
    <div id="containt">
        <div id="nav_left" class="nav_top">
            <ul>
                <li><a href="#" onclick="$('#new_voc_dia').show();">New Vocabulary</a></li>
                <li><a href="#">Summary</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </div>
    
        <div id="nav_right" class="nav_top">
            <ul>
                <li><a href="logout.php"><?PHP echo $_SESSION['user_display_name']; ?></a></li>
                
            </ul>
        </div>
    </div>
    
        <div id="count-box">
            <div id="progress_correct_count"></div>
            <div id="progress_wrong_count"></div>
        </div>
        
        <div id="word_display_div">
            <span id="word_display_span"></span>
            <a id="dictionary_link" target="_blank"><span id="dictionary">dictionary.com<span></a>
        </div>
    
        <div id="button_group">
            <div id="check_button" class="check_button">✔</div>
            <div id="cross_button" class="check_button">✗</div>
        </div>

        <div id="new_voc_dia">
            <div id="new_voc_dia_tri"></div>
            <a href="#"><img id="new_voc_dia_close"
                src="img/cross.png"
                onclick="$('#new_voc_dia').hide();"/></a>

            <input id="txt_new_voc"
                type="text"
                maxlength="25"
                placeholder=" type in new word and hit enter..."
                onkeydown="if (event.keyCode ==  13) enter_new_word($('#txt_new_voc').val());">
            <ul></ul>
    </body>
        </div>
</html>
