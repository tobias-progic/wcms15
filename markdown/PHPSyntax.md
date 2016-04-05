# Repetition av PHP-syntax

[http://phpepl.herokuapp.com/](REPL)

## Variabler

```PHP
$val = 42;
$str = "Hello World";
$float = 3.14;
```

## Strängar
Konkatenering sker med '.' (inte med '+')

```PHP
$str1 = "Hello";
$space = " ";
$str2 = "World!";

echo $str1 . $space . $str2; // "Hello World!"


//OBS! Se upp för +-tecknet
$val = 42;
echo $val + $str1; // --> 42 !!!

```

## Array
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

## Associativ Array
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
