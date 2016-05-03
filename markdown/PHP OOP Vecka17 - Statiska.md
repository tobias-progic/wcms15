## Statiska egenskaper och metoder

Klasser _instansieras_ som bekant m.h.a. det reserverade ordet `new`.
Vad händer om vi försöker komma åt en egenskap i en klass utan att ha instansierat den?

```php

class User {
    function printMe() {
        return "I am the User";
    }
}

User->printMe();    //Syntax error!

```

Säg att vi har en metod som vi vill kunna använda utan att ha en instans av klassen. En metod som alltid finns. En sådan metod går att skapa och kallas _statisk_. 

```php
class User {
    static function printMe() {
        return "I am the static User";
    }
}

echo User::printMe();   //--> "I am the static User"


```

På motsvarande sätt kan egenskaper vara statiska:
```php
class User {
    public static $commonProp = 42;
}

echo User::$commonProp; // --> 42

```

Värt att tänka är att statiska metoder _inte_ har tillgång till `$this` eftersom att `$this` får sitt värde först då ett objekt är instansierat från klassen.
```php
class User {
    
    private $myValue = 42;


    static function printMe() {
        return $this->myValue;  // --> "Using $this when not in object context"
    }
}

echo User::printMe();
```

## När behöver man statiska egenskaper och metoder?
Man kan betrakta statiska egenskaper och metoder som "namespace:ade" globala egenskaper och metoder.
Dvs att placera dem i en klass gör att de kan vara globalt tillgängliga, men namngivna utan att krocka med andra globala funktioner med samma namn.

Viktigt att tänka på är även att statiska metoder ska vara tillståndslösa (stateless). Dvs de har inget objekt att spara tillstånd (värden) i och behöver alltid fungera på samma sätt, för samma inparametrar.

Ex: 
```php
class Calculator {
    public static function add($x, $y) {
        return $x + $y;             //Alltid samma resultat för samma inparametrar
    }
} 

echo Calculator::add(2,2);  //--> 4