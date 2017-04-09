<?php
function auth($login, $passwd)
{
    if ($login && $passwd)
    {
        $users_list = file_get_contents("../private/passwd");
        if ($users_list)
        {
            $passwd = hash('whirlpool', $passwd);
            $users_list = unserialize($users_list);
            foreach ($users_list as $check)
            {
                if ($login == $check['login'] &&  $passwd == $check['passwd'])
                {
                    return (true);
                }
            }
            return (false);
        }
        return (false);
    }
    return (false);
}
?>