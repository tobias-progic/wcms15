
```PHP

class Wheel {
  function spin() {
    echo "Wheel spinning...";
  }
}


class Car {
  public $wheel1;
  
  function __construct() {
    $this->wheel1 = new Wheel;
  }
  
  function drive() {
    $this->wheel1->spin();  //$this->wheel är en medlemsvariabel i just det här objektet
    echo "Driving...";
  }
  
}

$car = new Car;
$car->drive();

```