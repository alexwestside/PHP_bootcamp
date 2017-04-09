<?php

if ($_POST['submit'] === 'OK')
{
    if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'])
    {
        $login = $_POST['login'];
        $oldpw = hash('whirlpool', $_POST['oldpw']);
        $newpw = hash('whirlpool', $_POST['newpw']);
        $user_list = file_get_contents("../private/passwd");
        if ($user_list)
        {
            $user_list = unserialize($user_list);
            foreach ($user_list as &$check)
            {
                if ($login === $check['login'] && $oldpw === $check['passwd'])
                {
                    $check['passwd'] = $newpw;
                    $user_list = serialize($user_list);
                    file_put_contents("../private/passwd", $user_list);
                    echo "OK\n";
                    exit ();
                }
            }
            echo "ERROR\n";
        }
        else
            echo "ERROR\n";
    }
    else
        echo "ERROR\n";
}
?>