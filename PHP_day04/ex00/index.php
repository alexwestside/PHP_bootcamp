<?php
session_start();
if ($_GET['submit'] === 'OK')
{
    if (($_GET['login']))
        $_SESSION['login'] = $_GET['login'];
    if (($_GET['passwd']))
        $_SESSION['passwd'] = $_GET['passwd'];
}
?>
<html>
<title>ex00</title>
    <body>
        <form method="get" action="index.php">
            Username: <input type="text" name="login" value="<?php if ($_GET['login'] !== 'login') echo $_SESSION['login']; ?>"/><br/>
            Password: <input type="password" name="passwd" value="<?php if ($_GET['passwd'] !== 'passwd') echo $_SESSION['password']; ?>"/><br/>
            Submit <input type="submit" name="submit" value="OK"/>
        </form>
    </body>
</html