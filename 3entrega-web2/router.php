<?php
require_once ('libs/router.php');
require_once('controllers/controller_jugadores.php');

// crea el router
$router = new Router();

// define la tabla de ruteo
                    // endpoint  // verbo // clase controlador // nombre funcion //
$router->addRoute('jugadores', 'GET', 'JugadoresApiController', 'ObtenerJugadores');
$router->addRoute('jugadores/:id', 'GET', 'JugadoresApiController', 'ObtenerJugador');
$router->addRoute('jugadores/:id', 'DELETE', 'JugadoresApiController', 'EliminarJugador');
$router->addRoute('jugadores', 'POST', 'JugadoresApiController', 'CrearJugador');
$router->addRoute('jugadores/:id', 'PUT', 'JugadoresApiController', 'EditarJugador'); 

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

?>