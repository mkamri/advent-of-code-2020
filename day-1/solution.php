<?php
/**
 * PROMPT
 * 
 * 'Find the two entries that sum to 2020 and then multiply those two numbers together.'
 */

    $input = file_get_contents('./input.txt');
    $array = array_map('intval', explode("\n", $input));

    $a;
    $b;

    for ($i = 0; $i < count($array); $i++) {
        $num1 = $array[$i];
        for ($j = 0; $j < count($array); $j++) {
            $num2 = $array[$j];

            if ($num1 + $num2 == 2020) {
                $a = $num1;
                $b = $num2;
            }
            
        }
    }

    echo $a * $b;

?>