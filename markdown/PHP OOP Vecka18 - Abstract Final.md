# Abstrakta klasser och `final` metoder

## Abstrakta klasser
Det går inte att instansiera abstrakta klasser utan deras syfte är att skapa en gemensam grund för en hierarki av objekt med garanterade gemensamma egenskaper.
De är alltid basklasser till konkreta klasser och dikterar således ett gemensamt API för subklasserna.


Ex: Vi vill säkra att vår klasshierarki av olika typer av `User` alltid har en public metod `log()`
```php

abstract class User {
    protected $username;
    abstract public function log();
}

//$a = new User; // Cannot instantiate abstract class User

class Guest extends User {
    public function __construct() {
        $this->username = "Guest";
    }

    public function log() {
        echo "Log has to be defined in the concrete class";
    }
}

$guest = new Guest();
$guest->log();

```

## Final

Metoder som är deklarerade som `final` kan inte overridas i en subklass. Man kan alltså säkerställa att en viss metod finns i alla subklasser, men bara i samma utförande som i basklassen.

Exempel med både `abstract` och `final`
```php
abstract class User {
  protected $name;
  
  abstract public function log();
  
  public final function login() {
    echo "Attempting sign in: " . $this->name . "<br>";
  }
}

class Admin extends User {
  
  public function __construct($username) {
    $this->name = $username;
  }
  
  public function log() {
    echo "Logging admin: " . $this->name . "<br>";
  }

  // public function login() { // Cannot override final method User::login()
  //   echo "Nope";            
  // }
  
  
}

$admin = new Admin("root");
$admin->log();
$admin->login();
```




