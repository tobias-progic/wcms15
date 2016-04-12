# PHP OOP Vecka15 - Konstanter

Om vi på förhand vet att vi kommer återanvända ett fast värde kan det vara bra att skapa en konstant.

Konstanter är värden som inte kan ändras, till skillnad från variabler.

En konstant definieras med det reserverade ordet `define`.

```PHP
define('NAME_OF_MY_CONSTANT', 'value of my constant');
```

Konstanter brukar skrivas med stora bokstäver för att tydligt signalera att de är just konstanter.
Till skillnad från variabler används inte $ före namnet på konstanten.


Exempel: Vår applikation ska skapa ett antal elever i en klass som alltid ska ha 23 st elever

```PHP

class Student {
    private $id;
    private $grade;

    function __construct($number) {
        $this->id = $number;
        $this->grade = 0;
    }
    
}


$students = [];

// ---------- Otydlig lösning  -----------

for ($i = 0; $i < 23; $i++) {               //Obs: var kom 23 ifrån???
    array_push($students, new Student($i));
}
echo "added " . count($students) . " students <br />"; // --> added 23 students

$students = [];





// ---------- Tydligare lösning  -----------

define('MAX_STUDENTS', 23);

for ($i = 0; $i < MAX_STUDENTS; $i++) {     //MAX_STUDENTS är lätt att förstå
    array_push($students, new Student($i));
}

echo "added " . count($students) . " students <br />";  // --> added 23 students


```