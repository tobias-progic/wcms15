# Magiska metoder

Magiska metoder är fördefinierade (inbyggda) metoder i PHP.
De börjar med två inledande _underscore_.
Hittills har vi använt __construct, men det finns även andra.

## __construct
Repetition: `__construct()` körs när ett objekt skapas från en klassedefinition med det reserverade ordet `new`.
Dvs `__construct()` ger oss möjlighet att haka på extra kod i instansieringsförfarandet.
Man kan betrakta `construct()` som ett slags plug-in och det är ett gemensamt drag för magiska metoder.


## Getters och Setters
Getters och Setters är magiska metoder som ger möjlighet att t.ex. komma åt privata medlemsvariabler som om de vore publika.
Dvs att läsa (get) och skriva (set) på variabler.
`__get()` körs då koden försöker komma åt en icke publik variabel och på samma sätt körs `__set()` då koden försöker sätta ett värde i en icke publik variabel.

Dessa två magiska metoder ger oss alltså möjlighet att haka på kod vid en specifik händelse, nämligen att koden försöker komma åt en variabel som inte är tillgänglig.

I exemplet nedan har vi sagt att vi tillåter utomstående kod att komma åt alla privata (`private`), skyddade (`protected`) och publika (`public`) medlemsvariabler.
```PHP
class MyClass {
  private $myProp1;
  private $myProp2;
  
  function __construct($prop1, $prop2) {
    $this->myProp1 = $prop1;
    $this->myProp2 = $prop2;
  }
  
  public function __get($prop) {
    if (property_exists($this, $prop)) {
      return $this->$prop;  //Obs! $-tecknet efter pilen
    }
  }
  
  public function __set($prop, $value) {
    if (property_exists($this, $prop)) {
      $this->$prop = $value;  //Obs! $-tecknet efter pilen
    }
  }
  
}


$myObject = new MyClass(42, 89);
$myObject->myProp1 = 111;
echo $myObject->myProp1;

```

Ett annat exempel är att _validera_ datat som sätts till en variabel.
Här vill vi försäkra oss om att enbart `$myNumber` ska gå att skriva till av de privata medlemsvariablerna.
Dessutom försäkrar vi oss om att det bara går att spara numeriska värden i `$myNumber`

```PHP
class MyClass {
  private $myProp1;
  private $myProp2;
  private $myNumber;
  
  function __construct($prop1, $prop2) {
    $this->myProp1 = $prop1;
    $this->myProp2 = $prop2;
  }
  
  public function __get($prop) {
    if (property_exists($this, $prop)) {
      return $this->$prop;  //Obs! $-tecknet efter pilen
    }
  }
  
  public function __set($prop, $value) {
    if (property_exists($this, $prop)) {
      if ($prop == "myNumber" && is_numeric($value)) {
          $this->$prop = $value;  //Obs! $-tecknet efter pilen
      }
    }
  }
  
}


$myObject = new MyClass(42, 89);
$myObject->myProp1 = 111; // Not accepted
echo $myObject->myProp1 . "<br />";  //--> 42
$myObject->myNumber = 8989;  // OK
echo $myObject->myNumber . "<br />";  //--> 8989
$myObject->myNumber = "hello"; // Not accepted
echo $myObject->myNumber; //--> 8989

```