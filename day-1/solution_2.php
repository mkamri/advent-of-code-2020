<?php
/**
 * PROMPT
 * 
 * 'In your expense report, what is the product of the three entries that sum to 2020'
 */

    $input = file_get_contents('./input.txt');
    $array = array_map('intval', explode("\n", $input));

    $a;
    $b;
    $c;

    for ($i = 0; $i < count($array); $i++) {
        $num1 = $array[$i];
        for ($j = $i + 1; $j < count($array); $j++) {
            $num2 = $array[$j];

            for ($k = $i + 2; $k < count($array); $k++) {
                $num3 = $array[$k];

                if ($num1 + $num2 + $num3 == 2020) {
                    $a = $num1;
                    $b = $num2;
                    $c = $num3;
                }
            }
            
        }
    }

    echo $a * $b * $c;

?>