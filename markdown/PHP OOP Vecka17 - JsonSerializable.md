# json_encode med icke publika medlemsvariabler

`json_encode` kodar inte medlemsvariabler som är `private` eller `protected`.
För att kunna skicka data från klasser med t.ex. privata medlemmar kan man implementera ett _interface_ som heter `JsonSerializable`.

Exempel:
```PHP
class User implements JsonSerializable {
  private $id;
  private $name;
  function __construct($id) {
    $this->id = $id;
    $this->name = $this->name . $this->id;
  }
  
  function jsonSerialize() {
    return array("id" => $this->id, "name" => $this->name);
  }
}


$max = 3;
for($i=0; $i<$max; $i++) {
  $arr["elem" . $i] = new User($i);
}

echo json_encode($arr);
```
