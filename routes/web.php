<?php

use Illuminate\Support\Facades\Route;
// use PhpParser\Node\Stmt\Echo_;
use App\Http\Controllers\ProductoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Crear nueva ruta
Route::get('hola', function(){
    return "Hello world";
});
// Crear ruta de arreglos
Route::get('arreglo',function(){
    $estudiantes=
    [  
       "AN" => "Ana", 
        "JU" =>"Juana", 
        "PA"=>"Paola"
    ];
    echo"<pre>";
    var_dump($estudiantes);
    echo"</pre>";
    echo"<hr/>";
    // agregar posicion
    $estudiantes["CR"]="Cristian";
    echo"<pre>";
    var_dump($estudiantes);
    echo"</pre>";
    // retirar elementos de un arreglo
    echo"<hr/>";
    unset($estudiantes["JU"]);
    echo"<pre>";
    var_dump($estudiantes);
    echo"</pre>";
});
Route::get('paises',function(){
    $paises=[
    "Colombia"=>[
        "capital"=>"Bogotá",
        "moneda"=>"Peso",
        "poblacion"=>"50,88 millones",
        "ciudades"=>[
            "Bogota",
            "Medellin",
            "Cali"
        ]
    ],
    "Japon"=>[
        "capital"=>"tokyo",
        "moneda"=>"yen",
        "poblacion"=>"125.8 millones",
        "ciudades"=>[
            "Tokyo",
            "Hiroshima",
            "Nagazaky"
        ]

    ],
    "Peru"=>[
        "capital"=>"lima",
        "moneda"=>"sol",
        "poblacion"=>"32.97 millones",
        "ciudades"=>[
            "Lima",
            "Arequipa",
            "Cusco"
        ]

    ],
    "Argentina"=>[
        "capital"=>"buenos aires",
        "moneda"=>"peso",
        "poblacion"=>"45,38 millones",
        "ciudades"=>[
            "Buenos aires",
            "La plata",
            "Rosario"
        ]

    ],
    "Paraguay"=>[
        "capital"=>"asuncion",
        "moneda"=>"guarani",
        "poblacion"=>"7.1 millones",
        "ciudades"=>[
            "Asuncion",
            "Encarnación",
            "Ciuad del este"
        ]
    ]
    ];
    // foreach($paises as $pais=>$infoPais){
    //     echo"<pre>";
    //     echo "<h1 style=\"color:red\">$pais</h1>";
    //     echo "capital: ".$infoPais["capital"]."<br>";
    //     echo "moneda: ".$infoPais["moneda"]."<br>";
    //     echo "poblacion: ".$infoPais["poblacion"]."<br>";
    //     echo"</pre>";
    //     echo "<hr/>";
    // }

    // foreach ($paises as $pais => $infoPais) {
    //     echo"<h1 style=\"color:#E0BAF1\">$pais</h1>";
    //     foreach ($infoPais as $clave => $valor) {
    //         echo "$clave : $valor <br>";
    //         foreach ($valor as $ciudadesPrincipales => $infoCiudades) {
    //             echo "$ciudadesPrincipales:$infoCiudades <br>";
    //         }
    //     }
    //     echo "<hr>";
    // }
    return view('paises')->with("paises", $paises);
});
Route::get('new',function(){
    return view('products/new');
});
// Create routes rest
Route::resource('productos', ProductoController::class);('')
?>