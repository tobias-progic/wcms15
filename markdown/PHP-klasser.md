# Klasser och objekt

Klasser är _ritningar_ till _instanser_ (objekt).

De kan ha två olika sorters relationer:

1. Arv ("är")
2. Komposition ("har")

Ett objekt skapas utifrån klassdefinitionen och har en unik "identitet".
Dvs, flera objekt (instanser) kan skapas oberoende av varandra från samma klass.
Mer om det nedan.


Klasser kan innehålla såväl medlemmar, eller egenskaper (properties) som metoder (funktioner)

Nyckelord:
* `class`
* `new`
* `->`
* `$this`
* `extends`
* `__construct`
* `public`

## Tips
`var_dump($var)` skriver ut komplexa datatyper, t.ex. klasser.

## class (med data)

Använd `class` för att deklarera en klass.
Ett klassnamn följer samma regler som variabelnamn och kan t.ex. inte inledas med siffror.

Ex: `Graph2d` är godkänt medan `2dGraph` inte är det.

Låt oss skapa en klass som beskriver en cirkel med egenskaperna;
* Diameter
* Färg
* Mittpunkt

```PHP
//Blueprint
class Circle {
    public $diameter;   //"Public" deklarerar variabelns synlighet. Mer om detta nästa vecka
    public $color;
    public $center;
}

//Create a new instance
$circle1 = new Circle;
$circle1->diameter = 42;

var_dump($circle1); // --> object(Circle)#26 (3) { ["diameter"]=> int(42) ["color"]=> NULL ["center"]=> NULL }

//Create a new instance
$circle2 = new Circle;
$circle2->diameter = 89;
$circle2->color = "green";

var_dump($circle2); // --> object(Circle)#76 (3) { ["diameter"]=> int(89) ["color"]=> string(5) "green" ["center"]=> NULL }

```

## class (med data och metoder)
```PHP
//Blueprint
class Circle {
    public $diameter;
    public $color;
    public $center;

    public function getColor() {
        return $this->color;   // $this = magic keyword!
    }
}

//Create a new instance
$circle1 = new Circle;
$circle1->color = "green";

echo $circle1->getColor(); // --> "green"

//Create a new instance
$circle2 = new Circle;
$circle2->color = "grey";

echo $circle2->getColor(); // --> "grey"

```

## class (med konstruktor)
```PHP
//Blueprint
class Circle {
    public $diameter;
    public $color;
    public $center;

    function __construct($diameter, $color, $center) {
        $this->diameter = $diameter;
        $this->color = $color;
        $this->center = $center;
    }

    public function getColor() {
        return $this->color;   // $this = magic keyword!
    }
}

//Create a new instance
$circle1 = new Circle(42, "green", 0);
echo $circle1->getColor(); // --> "green"

//Create a new instance
$circle2 = new Circle(89, "grey", 0);

echo $circle2->getColor(); // --> "grey"
```

## extends
`extends` används då en klass "ärver" från en annan klass (sk basklass eller `parent`)

Kom ihåg: Objektorienterat arv är väldigt olikt mänskligt arv.
Klasser kan ärva från en eller flera basklasser

I exemplet säger vi att Baloon2d ärver från Circle. Baloon2d "är" en Circle (plus lite egna egenskaper)

```PHP
//Blueprint
class Circle {
    public $diameter;
    public $color;
    public $center;

    function __construct($diameter, $color, $center) {
        $this->diameter = $diameter;
        $this->color = $color;
        $this->center = $center;
    }

    public function getColor() {
        return $this->color;   // $this = magic keyword!
    }
}

//Baloon2d ärver från Circle
class Baloon2d extends Circle {
    public $altitude;

    function __construct($diameter, $color, $center, $altitude) {
        $this->diameter = $diameter;
        $this->color = $color;
        $this->center = $center;
        $this->altitude = $altitude;
    }
}

$baloon1 = new Baloon2d(42, "yellow", 0, 89);

var_dump($baloon1); // --> object(Baloon2d)#76 (4) { ["altitude"]=> int(89) ["diameter"]=> int(42) ["color"]=> string(6) "yellow" ["center"]=> int(0) }
```

## Komposition
En `Circle` _har_ en mittpunkt men den _är_ inte en mittpunkt.

Vi låter `Circle` ha en mittpunkt av typen `Point2d` samt ett handtag också av type `Point2d`.

```PHP
//Blueprint
class Point2d {
    public $x, $y;

    function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }
}


class Circle {
    public $diameter;
    public $color;
    public $center; // av typen Point2d
    public $handle; // av typen Point2d

    function __construct($diameter, $color, Point2d $center, Point2d $handle) {
        $this->diameter = $diameter;
        $this->color = $color;
        $this->center = $center;
        $this->handle = $handle;
    }

    public function getColor() {
        return $this->color;   // $this = magic keyword!
    }
    
    public function getCenter() {
        return $this->center;
    }

    public function getHandle() {
        return $this->handle;
    }
}

$circle = new Circle(42, "green", new Point2d(0,0), new Point2d(0,-42));

var_dump($circle->getCenter()); // --> object(Point2d)#139 (2) { ["x"]=> int(0) ["y"]=> int(0) } -->
var_dump($circle->getHandle()); // --> object(Point2d)#97 (2) { ["x"]=> int(0) ["y"]=> int(-42) }

```

# Vehicle - Car - Bus
Här ett lösningsförslag på uppgiften om fordon.

Uppgiften löd (ungefär):
>Skapa ett program som har basklassen Vehicle med egenskaperna
>weight, length, power, wheels drive()

>Ärv Bil och Buss från Vehicle

>Skapa en drive()-metod i basklassen.

>Instansiera barnklasserna (Car och Bus) och anropa drive() på dessa.

>Skriv allt i samma fil

```PHP
class Vehicle {
    public $power;
    public $wheels;
    public $weight;
    public $length;

    public $vehicleType;

    public function drive() {
        echo $this->vehicleType . " driving. \r\n";
    }

    function __construct($power, $wheels, $weight, $length) {

        $this->vehicleType = "Vehicle";

        $this->power = $power;
        $this->wheels = $wheels;
        $this->weight = $weight;
        $this->length = $length;
    } 

}

class Car extends Vehicle {
    public $hitch;

    public function __construct() {
        $this->vehicleType = "Car";
    }

    public function setHitch($hitch) {
        $this->hitch = $hitch;
    }

}

class Bus extends Vehicle {
    public $price;

    public function setPrice($price) {
        
        $this->vehicleType = "Bus";

        $this->price = $price;
    }
}


$car = new Car(42, 4, 1500, 2.4);
$car->setHitch(89);
$car->drive();

$bus = new Bus(89, 18, 18000, 18);
$bus->setPrice(42);
$bus->drive(); 

```
