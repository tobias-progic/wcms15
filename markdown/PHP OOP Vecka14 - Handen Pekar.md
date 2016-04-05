```PHP
class Finger {
    function fold() {
        echo "Folding finger.\r\n";
    }
}

class IndexFinger extends Finger {
    function point() {
        echo "Pointing index finger.\r\n";
    }
}

class Hand {
    
    public $fingers;
    public $nbrFingers;
    public $indexFinger;
    
    function __construct() {
        
        $this->nbrFingers = 4;
        $this->fingers = [];
        
        for ($i=0; $i < $this->nbrFingers; $i++) {
            array_push($this->fingers, new Finger);
        }
        
        $this->indexFinger = new IndexFinger;
    }
    
    function point() {
        
        foreach($this->fingers as $finger) {
            $finger->fold();
        }
        
        $this->indexFinger->point();
        
    }
    
}


class Arm {
    public $hand;
    public $which;
    
    function __construct($which) {
        $this->which = $which;
        $this->hand = new Hand;
    }
    
    function raiseAndPoint() {
        echo "Raising arm " . $this->which . ". \r\n";
        $this->hand->point();
    }
}

class Human {
    
    public $name;
    public $age;
    public $gender;
    
    public $arms;
    public $nbrArms;
    
    function __construct($name, $age, $gender) {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->arms = array();
        $this->nbrArms = 2;

        for ($i = 0; $i < $this->nbrArms; $i++) {
            array_push($this->arms, new Arm($i));
        }
    }
    
    function pointAtSomething($which) {

        if ($which < $this->nbrArms) {
            $this->arms[$which]->raiseAndPoint();
        } else {
            echo "uhm... I don't have an arm on index '" . $which . "'! \r\n";
        }
    }

    function setNbrOfArms($nbr) {
        if ($nbr <= $this->nbrArms) {
            $this->nbrArms = $nbr;
        }
    }
}

$human = new Human("Tester", 42, "male");
$human->pointAtSomething(1);
$human->setNbrOfArms(1);
$human->pointAtSomething(0);
$human->pointAtSomething(1);
```