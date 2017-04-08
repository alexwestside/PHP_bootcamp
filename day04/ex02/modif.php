<?php

if ($_POST['submit'] === 'OK')
{
    if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'])
    {
        $login = $_POST['login'];
        $oldpw = $_POST['oldpw'];
        $newpw = $_POST['newpw'];
        $user_list = file_get_contents("../../private/passwd");
        $user_list = unserialize($user_list);
        foreach ($user_list as $chek)
        {
            if ($login == $chek['login'] && $oldpw == $chek['passwd'])
            {
               $chek['passwd'] = $newpw;
               $user_list = serialize($user_list);
               file_put_contents("../../private/passwd", $user_list);
               echo "OK\n";
               exit ();
            }
            else
                echo "ERROR\n";
        }
        echo "ERROR\n";
    }
    else
        echo "ERROR\n";
}
?>