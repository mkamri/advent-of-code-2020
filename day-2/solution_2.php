<?php
/**
 * PROMPT
 * 
 * 'To try to debug the problem, they have created a list (your puzzle input) of passwords
 * (according to the corrupted database) and the corporate policy when that password was set.
 * 
 * Each policy actually describes two positions in the password, where 1 means the first character, 
 * 2 means the second character, and so on. (Be careful; Toboggan Corporate Policies have no concept 
 * of "index zero"!) Exactly one of these positions must contain the given letter. Other occurrences 
 * of the letter are irrelevant for the purposes of policy enforcement.
 * 
 * How many passwords are valid according to their policies?'
 * 
 */
    
    // create the class
    
    class PasswordCheck
    {
        public $p1;
        public $p2;
        public $letter;
        public $passwordArray;

        public function __construct($p1, $p2, $letter, $password) {
            $this->letter = $letter;

            $this->passwordArray = str_split($password);

            if (isset($this->passwordArray[$p1 - 1])) {
                $this->p1 = $this->passwordArray[$p1 - 1];
            } else {
                $this->p1 = 9999;
            }
            
            if (isset($this->passwordArray[$p2 - 1])) {
                $this->p2   = $this->passwordArray[$p2 - 1];
            } else {
                $this->p2 = 9999;
            }
        }

        public function test() {
            if ( $this->p1 === $this->letter && $this->p2 !== $this->letter ) {
                return true;
            } else if ( $this->p1 !== $this->letter && $this->p2 === $this->letter ) {
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
        $p1 = intval($lowHighArray[0]);
        $p2 = intval($lowHighArray[1]);

        $letter = str_replace(":", "", $lineArray[1]);

        $password = $lineArray[2];

        $lineTest = new PasswordCheck($p1, $p2, $letter, $password);

        if ($lineTest->test() == true) {
            $validPassCount++;
        }

    }


    echo $validPassCount;

?>