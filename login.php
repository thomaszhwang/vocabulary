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
    <link type="text/css" rel="stylesheet" href="css/login.css"/>
</head>

<body>

    <?PHP
        echo $u->err_msg;
    ?>
    <div id="login">

    <form method="post" action="login.php">
        <input type="hidden" name='submitted' id='submitted' value='1'/>
        <input type="email" placeholder="Email" name="user_email"/>
        <input type="password" placeholder="Password" name="password"/>
        <div id="three-things">
        <input id="submit" type="submit" value="Log in" />
        
        <label>
         <input id="remember_me" type="checkbox" name="remember_me"></input>
            <p id="keep-box">Remember me on this computer…<p>
            <a class="style-f" href="">Forgot your password?</a>
            <a class="style-f" href="">Register</a>
        </label>
        </div>
    </form>
    
    
    </div>
</body>
</html>
