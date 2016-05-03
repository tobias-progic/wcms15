# Namespaces

Namespaces är ett sätt att säkerställa unika namn på t.ex. klasser med vanliga namn.
T.ex. kan man tänka sig att klassnamn som User, Logger, Database osv kan förekomma på flera ställen i en stor kodbas, i synnerhet då man använder sig av kodbibliotek från tredje part.

M.h.a. namespaces så får varje klassnamn ett _prefix_ som gör namnet unikt.
Man kan tänka på det som t.ex. en fil i ett filsystem; det går ju inte att skapa t.ex. `readme.md` två gånger i samma katalog, men det går utmärkt att skapa `readme.md` i flera kataloger.

Betrakta följande kod med dubbla klassdefinitioner för klassen `User`
```php

class User {
    
}

class User {
    
}

//PHP Fatal error:  Cannot redeclare class User in /some/folder/file.php on line X

```


Problemet kan uppstå genom att inkludera filer med klassdefinitioner med samma namn t.ex:
```php

//classes1.php
class User {
    //...
}


//classes2.php
class User {
    //...
}

//index.php
include "classes1.php";
include "classes2.php";   //Boom! Cannot redeclare class User...

$c = new User;

```


Lösning med namespaces
```php

//classes1.php

namespace Util;

class User {
    function printMe() {
        return "Util/User";
    }
}


//classes2.php

namespace Api;

class User {
    function printMe() {
        return "Api/User";
    }
}

//index.php
include "classes1.php";
include "classes2.php";

$v = new Util/User; // Välj ut vilken User-klass som faktiskt avses

echo $v->printMe(); // --> "Util/User"

```




