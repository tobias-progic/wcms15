<?php

    spl_autoload_register(function($className) {
        include $className . ".class.php";
    });


    // Create instances and test marry() and makeBaby()
    $person = new Person("Hirohito", "1973-05-09", "male");
    $spouse = new Empress("Yukie", "1973-03-24", "female");

    $person->marry($spouse);

    $child = $person->makeBaby("Chewbacca", "Leia"); 
    if (isset($child)) {
        echo "baby " . $child->getName() . " was born\r\n";
    }


    // Make sure that an underage person/emperor/empress can't get married to anyone
    $adolescent = new Person("Skateboard04", "2004-06-09", "female");
    $adult = new Emperor("Palpatine", "1980-01-01", "male");

    $adolescent->marry($adult);

?>