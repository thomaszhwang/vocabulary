<?PHP
require_once("./include/user_config.php");
if(isset($_POST['submitted'])) {
    if($u->Login()) $u->redirectToURL("index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"
            charset="utf-8"></script>
    <script src="js/login.js" charset="utf-8"></script>
    <link type="text/css" rel="stylesheet" href="css/login.css"/>
</head>

<body>
    <div id="logo-image"></div>
    <div id="login">

    <form method="post" action="login.php">
        <input type="hidden" name='submitted' id='submitted' value='1'/>
        <input type="email" placeholder="Email" name="user_email"/>
        <input type="password" placeholder="Password" name="password"/>
        <div id="three-things">
        <input id="submit" type="submit" value="Log in" />
        
        <label>
            <a class="style-f" href="">Forgot your password?</a>
            <a class="style-f" href="">Register</a>
        </label>
        </div>
    </form>
    
    
    </div>
</body>
</html>
