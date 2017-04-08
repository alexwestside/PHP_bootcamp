<?php

if ($_POST['submit'] === 'OK')
{
    $login = $_POST['login'];
    $password = hash('whirlpool', $_POST['passwd']);
    $users_list = ['login' => $login, 'passwd' => $password];
    if ($_POST['login'] && $_POST['passwd'])
    {
        if (file_exists("../../private/passwd"))
        {
            $users_list = file_get_contents("../../private/passwd");
            $content = unserialize($users_list);
            foreach ($content as $check)
            {
                if (($_POST['login'] === $check['login']))
                {
                    echo "ERROR\n";
                    exit();
                }
            }
            $content[] = $users_list;
            $content = serialize($content);
            file_put_contents("../../private/passwd", $content);
        }
        else
        {
            if (!file_exists("../../private"))
                mkdir("../../private");
            $users_list[] = $users_list;
            $content = serialize($users_list);
            file_put_contents("../../private/passwd", $content);
        }
        echo "OK\n";
    }
    else
        echo "ERROR\n";
}
?>