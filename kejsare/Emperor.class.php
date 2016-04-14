<?php

class Emperor extends Person {

    function __construct($name, $birthdate) {
        $this -> name = $name;
        $this -> birthdate = $birthdate;
        $this -> rank = parent::ROYALTY;
        $this -> gender = "male";
    }

}

?>