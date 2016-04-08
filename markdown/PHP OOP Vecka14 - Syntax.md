# Repetition av PHP-syntax

Använd en REPL* för att testköra kod direkt i en webbläsare.

[REPL1](http://sandbox.onlinephpfunctions.com/)

[REPL2](http://phpepl.herokuapp.com/)


> REPL = Read-eval-print-loop, dvs en "sandlåda" för att köra din (PHP-)kod

## Reserverade ord (keyword)
PHP innehåller s.k. [_reserverade ord_](http://php.net/manual/en/reserved.keywords.php) som t.ex.
* `if`
* `switch`
* `function`

Reserverade ord är ord som har en fördefinierad, specifik betydelse som inte kan användas för andra ändamål än vad de är definierade som.
Det går t.ex. inte att skapa en funktion som har samma namn som ett reserverat ord
```PHP
//FEL!
function if() {     //Uncaught exception 'PHPParser_Error' with message 'Syntax error, unexpected T_IF,....
    echo "what?";
}

if();

```


Närbesläktat med reserverade ord är inbyggda funktioner som t.ex. `var_dump` eller `echo`, som per definition inte är reservade ord (sett ur PHP-systemets perspektiv), men i all väsentligt kan betraktas som reserverade ord.

```PHP
//FEL!
function var_dump() {   //Cannot redeclare var_dump()
    echo "my own var_dump!";
}

```


## Variabler
Variabler är förutbestämda, namngivna platser ("placeholders") som kan innehålla olika värden. De kan _variera_, därav namnet variabel.

Då ett värde sätts i en variabel (mha likhetstecken, `=`) sägs att en _tilldelning_ sker.

Dvs en variabel tilldelas ett värde. (Variabeln får ett värde).

```PHP
$val = 42;              //integer
$str = "Hello World";   //sträng
$float = 3.14;          //float
```

Då en variabel _inte_ har tilldelats ett värde sägs att den odefinierad, dvs den har inget värde.

```PHP
$val;

echo $val;  //Undefined variable: val

```

## Datatyper

### integer (heltal)
En integer är ett positivt eller negativt heltal, ex: `42`, `-42`.
Det maximala värdet av integer bestäms av hur PHP är [konfigurerat](http://php.net/manual/en/reserved.constants.php).


### float (decimaltal)
En float är ett poisitivt eller negativt decimaltal, ex: `3.14`, `-3.14`.

### Strängar (text)
Konkatenering sker med '.' (inte med '+').

```PHP
$str1 = "Hello";
$space = " ";
$str2 = "World!";

echo $str1 . $space . $str2; // "Hello World!"


//OBS! Se upp för +-tecknet
$val = 42;
echo $val + $str1; // --> 42 !!!

```

#### Smarta strängar
Strängar kan skapas med " eller ' vilket får strängen att bete sig på olika sätt.


### boolean (true eller false)
Booelan-värden används då man t.ex. behöver skilja på om något är på/av, rätt/fel eller tillåtet/icke tillåtet.
Booleans lagras i variabler på samma sätt som siffervärden (integers), strängar o.s.v.

Ex:
```PHP
$val = true;
$val = false;

```

Det är vanligt att returnera boolean (true eller false) i funktioner eller metoder vars resultat används för att fatta beslut, t.ex. i en `if`-sats.

Ex:
```PHP
//vi låtsas att programmet har en user_login()-funktion i en annan fil
//samt att $someUser har ett värde som skapats då användaren tryckte på en Logga In-knapp nånstans.

if (user_login($someUser)) {
    echo "logged in!"
} else {
    echo "not allowed! return to login page";
}

```



### Array (lista)
Lista av objekt eller primitiver (strängar, integers, osv)

```PHP
$arr1 = array();    //Tom array med längden 0
$arr2 = [];         //Tom array med längden 0
$arr3 = array(5);   //Tom array med längden 5

$value1 = 42;
$value2 = "89";

$arr4 = array($value1, $value2);
$arr5 = array(42, 89, 3.14);
$arr6 = array(42, "42", 4.2);

$length = count($arr6);
echo $length; // --> 3
```

### Associativ Array (lista med nycklar)
"Nycklad" lista av objekt eller primitiver

```PHP
$val = 42;
$arr1 = array("key1" => "value1", "key2" => "value2");
$arr2 = array($val => "dynamic!", "key2" => "value2");

echo $arr1["key1"]; // --> "value1"
echo $arr2[$val]; // --> "dynamic!"
```

## Loopar

### for()
"C-liknande" loop med explicit inkrementering av index

Syntax
```
for ($initialize; $compare; $increment;) {
    //loop body
}
```

Exempel
```PHP
$arr = array("Hello", "World!");

for ($i=0; $i < count($arr); $i++) {
    echo $i . ":" . $arr[$i];
}

//-->"0:Hello1:World!"
```


### foreach()
Implicit inkrementering av index och valbar index-parameter

Syntax
```PHP
foreach($array as $item) {
    //loop body
}

foreach($array as $key => $item)
```

Exempel
```PHP
$arr = array("Hello", "World!");

foreach ($arr as $item) {
    echo $item . " ";
}
//--> "HelloWorld!"

foreach ($arr as $key => $item) {
    echo $arr[$key] . " is the same as " . $item . ". ";
}
//--> "Hello is the same as Hello. World! is the same as World!."
```

### while

```PHP
$val = 3;
$i = 0;

while ($i < $val) {
  echo $i . "\r\n";
  $i++;
}
```


### do while
```PHP
do {
    echo $i;
} while ($i > 0);
```

### if - else
`if` bestämmer vilken väg vår kod ska ta.

Uttrycket inom parenteserna `if(...)` måste returnera något som kan tolkas som true eller false.

D.v.s. det kan vara en jämförelse av tal (som nedan), ett anrop till en funktion eller något annat som gör det möjligt att avgöra om uttrycket inom parenteserna är sant eller falskt.

Ex: 
> * Om ett värde är mindre än 42 -> Addera 1 och skriv ut "ökade med ett"
> * Om ett värde är mer än 42 -> Skriv ut "klar"
> * Om värdet är något annat -> Skriv ut "hej då"

```PHP
$value = 42;

if ($value < 42) {
    $value = $value + 1; //Eller: $value++
    echo "ökade med ett";
}
else if ($value > 42) {
    echo "klar";
}
else {
    echo "hej då";
}
```

### switch - case
`switch` är s.k. "syntaktiskt socker" ("syntactic sugar" eller "sugar") för `if - else`

Ex:
> * Om ett värde är 42 -> skriv ut "hej"
> * Om värdet är 89 -> skriv ut "hej då"
> * Om värdet är något annat -> skriv ut "okänt värde"



```PHP

$value = 42;

switch($value) {
    case 42:
        echo "hej";
        break;
    case 89:
        echo "hej då";
        break;
    default:
        echo "okänt värde";
        break;
}

```


## Lite hjälpmedel
I PHP (och i andra språk) förekommer en del förkortade sätt att skriva vissa statements.

### Öka/minska med 1 (++ och --)

Som bekant kan man öka en variabels värde med 1 på följande sätt:
```PHP
$var = 42;
$var = $var + 1; //43
```
Eftersom att detta är en vanlig _operation_ (t.ex. i loopar), så finns det ett kortare sätt:
```PHP
$var = 42;
$var++; //43
```

På motsvarande vis kan man minska ett värde:
```PHP
$var = 42;
$var--; //41
```

Både `++` och `--` kan placeras före (till vänster om) eller efter (till höger om) variabeln vars värde ska förändras.

> Då `++` eller `--` placeras _före_ variablen förändras värdet _före eventuell tilldelning_.
> Då `++` eller `--` placeras _efter_ variablen förändras värdet _efter eventuell tilldelning_.

Ex:
```PHP

$result = 0;
$value = 42;

$result = $value++; //$result = 42, $value = 43

$result = ++$value; //$result = 44, $value = 44;

```


### ?-operatorn
Frågetecken (eller the "ternary operaror") kan användas som socker för en enkel `if`-sats

Jämför:
```PHP

$value = 42;

function isFortyTwo($val) {
    if ($val == 42) {
        return true;
    } else {
        return false;
    }
}

```
med:
```PHP

$value=42;

function isFortyTwo($val) {
    return $val == 42 ? true : false;
}

```
