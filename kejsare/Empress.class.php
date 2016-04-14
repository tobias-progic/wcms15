<?php

    class Empress extends Emperor {

        function __construct($name, $birthdate) {
            $this -> name = $name;
            $this -> birthdate = $birthdate;
            $this -> gender = "female";
            $this -> rank = parent::ROYALTY;
        }

    }

?>