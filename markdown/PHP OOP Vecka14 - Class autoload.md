För att slippa skriva `include "somefile1.php";`, `include "somefile12.php"`, ... kan man använda autoload.
Autoload sköter inkluderingen av filer baserat på konvention (förutbestämt mönster) som t.ex. att alla klassfiler döps enligt formeln:
"ClassNamn".class.php

```PHP

//Döp alla filer till <Class name>.class.php
//Ex: IndexFinger.class.php

//I main-filen (entry point) använd
spl_autoload_register(function ($className) {
    include $className . '.class.php';
});

    
```