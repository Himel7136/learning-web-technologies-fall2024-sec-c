<?php

    $number1=22;
    $number2=47278;
    $number3=1;
    echo" The 1st Number =$number1<br> The 2nd Number =$number2<br> The 3rd Number =$number3<br>";

    if($number1>$number2)
    {
        if($number1>$number3){
            echo"The Lergest Number between three is $number1";
        }
    }
    elseif($number2>$number3)
    {
        echo"The Lergest Number between three is $number2";
    }
    else{
        echo"The Lergest Number between three is $number3";
    }

?>