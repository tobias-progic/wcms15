### funktioner och metoder
En `function` samlar beteende (kod) som kan köras (anropas) flera gånger.
Dessutom kan funktioner få in värden från omgivningen (parametrar).

Vissa funktioner behöver meddela hur körningen gick, andra inte.
Då en funktion svarar med ett värde till koden som anropade den används `return`.
Om en funktion inte ska returnera ett värde så utelämnar man `return`.

> Ex: Ta ett värde, öka med tre och dela resultatet med 4 och svara med värdet av uträkningen.

```PHP
$value = 42;

function addThreeAndDivideByFour($val) {
    $result = $val + 3;
    $result = $result / 4; 

    return $result;
}

```

Funktioners namn följer vissa regler, precis som varabelnamn.
En vanlig konvention är att funktionsnamn är verb, eftersom att de _gör_ något.

_Metoder_ är funktioner som tillhör ett objekt. Dvs de är funktioner som inte existerar utan att ett objekt är skapat.

```PHP

class Car {
    function drive() {
        echo "driving...";
    }
}

drive();    //Call to undefined function drive()

$myCar = new Car();
$myCar->drive();    // --> "driving..."

```