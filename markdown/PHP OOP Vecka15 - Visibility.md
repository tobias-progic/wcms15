# PHP OOP Vecka 15 - Synlighet (Visibility)

Synlighet (visibility) - att styra medlemsvariablers och metoders synlighet utanför klassen.

Synlighet används för att skydda data från åtkomst.

En klass kan ha variabler som inte ska kunna ändras eller läsas från "utsidan".

Antingen är det data som är klassens egna angelägenheter som t.ex. interna tillstånd eller kanske ett identitetsnummer som aldrig ska ändras.

Det kan också röra som om data som behöver vara av ett visst format eller av en viss typ och det behövs en metod för att kontrollera att datat är "rätt" innan det sparas i en medlemsvariabel.

Det finns tre nivåer av synlighet som deklareras m.h.a. sk _access modifiers_

* `public` - medlemsvariabeln är tillgänglig utanför klassen
* `private` - medlemsvariabeln är endast tillgänglig i klassen
* `protected` - medlemsvariabeln är endast tillgänglig i klassen och dess barn (ärvda klasser)

> OBS! I en av länkarna används det reserverade ordet `var`. Detta är PHP4 och ska undvikas, även om det också fungerar i PHP5. Deklarera istället medlemsvariablerna med rätt access modifier

Synlighet gäller både medlemsvariabler och metoder.

Ex: variablers synlighet
```PHP
class ParentClass {
  public $publ      = "public";     //kan kommas åt varifrån som helst
  protected $prot   = "protected";  //kan bara kommas åt från den egna och ärvda klasser
  private $pri      = "private";    //kan bara kommas åt i den egna klassen
  
  function printMe() {
    echo $this->publ . " ";
    echo $this->prot . " ";
    echo $this->priv . " ";
  }
  
}


class Child extends ParentClass {
  
  function p() {
    echo $this->publ . "<br />";
    echo $this->prot . "<br />";
    //echo $this->priv . "<br />";  //Error: Undefined property: Child::$priv
  }
  
}

$base = new ParentClass;
echo $base->publ . "<br />";  //--> "public"
//echo $base->prot; //Error: Cannot access protected property ParentClass::$prot
//echo $base->priv; //Error: Undefined property: ParentClass::$priv

$child = new Child;
$child->publ = "publiken jublar";
//$child->prot = "går inte!"; //Error: Cannot access protected property Child::$prot
//echo $child->priv;  //Error: Undefined property: Child::$priv
$child->p();
```

Ex: metoders synlighet
```PHP
class Identity {
  private $identity;

  private function initialize() {
    $this -> identity = rand(0,65536);
  }

  public function __construct() {
    $this -> initialize();
  }

  public function getIdentity() {
    return $this -> identity;
  }

}

$identity = new Identity();
echo $identity -> getIdentity();
//$identity -> initialize();  //Error: Call to private method Identity::initialize() 

```