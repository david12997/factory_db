<?php

require_once __DIR__ . '/vendor/autoload.php';

phpinfo();


//ordenamiento por burbua estructuras de datos
$lista = [2, 5, 8, 7, 4, 3];
var_dump(count($lista));

for ($i = 0; $i < count($lista) - 1; $i++) {

    for ($x = 0; $x < (count($lista) - 1); $x++) {

        if ($lista[$x] > $lista[$x + 1]) {

            $memory = $lista[$x];
            $lista[$x] = $lista[$x + 1];
            $lista[$x + 1] = $memory;
        }
    }
}

var_dump($lista);
