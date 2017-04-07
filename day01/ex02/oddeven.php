#!/usr/bin/php
<?php
while(1)
{
    $limit1 = 2147483647;
    $limit2 = -2147483648;
    print ("Enter a number: ");
    if ($temp = fgets(STDIN))
    {
        $temp2 = rtrim($temp);
        if (!is_numeric($temp2))
            print ("The '$temp2' is not a number\n");
        else
            {
            $num = intval($temp2);
            if ($num == 0)
                print ("The number '0' is even\n");
            else if ($num > $limit1 || $num < $limit2)
                print ("Enter 2147483647 < num > -2147483648\n");
            else if (!($num % 2))
                print ("The number '$num' is even\n");
            else if ($num % 2)
                print ("The number '$num' is odd\n");
        }
    }
    else
        return;
}
?>