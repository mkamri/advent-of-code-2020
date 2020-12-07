<?php
/**
 * PROMPT
 * 
 * 'To try to debug the problem, they have created a list (your puzzle input) of passwords
 * (according to the corrupted database) and the corporate policy when that password was set.
 * 
 * Each line gives the password policy and then the password. The password policy indicates 
 * the lowest and highest number of times a given letter must appear for the password to be 
 * valid. For example, 1-3 a means that the password must contain a at least 1 time and at 
 * most 3 times.
 * 
 * How many passwords are valid according to their policies?'
 * 
 */
    
    // create the class
    
    class PasswordCheck
    {
        public $low;
        public $high;
        public $letter;
        public $password;

        public function __construct($low, $high, $letter, $password) {
            $this->low    = $low;
            $this->high   = $high;
            $this->letter = $letter;
            $this->password = $password;
        }

        public function test() {
            $letterCount = substr_count($this->password, $this->letter);
            if ( $letterCount >= $this->low && $letterCount <= $this->high) {
                return true;
            } else {
                return false;
            }
        }
    }


    // test the passwords
    
    $input = file_get_contents('./input.txt');
    $lines = explode("\n", $input);
    $validPassCount = 0;

    for ($i=0; $i < count($lines); $i++)
    {
        $lineArray = explode(" ", $lines[$i]);

        $lowHighArray = explode("-", $lineArray[0]);
        $low = intval($lowHighArray[0]);
        $high = intval($lowHighArray[1]);

        $letter = str_replace(":", "", $lineArray[1]);

        $password = $lineArray[2];

        $lineTest = new PasswordCheck($low, $high, $letter, $password);

        if ($lineTest->test() == true) {
            $validPassCount++;
        }
    }

    echo $validPassCount;

?>