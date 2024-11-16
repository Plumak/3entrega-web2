<?php
require_once('models/model_jugadores.php');
require_once('view.php');
class JugadoresApiController {
    private $model;
    private $view;
public function __construct(){
    $this->model = new JugadoresModel();
    $this->view = new ApiView();
}

function ObtenerJugadores($req){
    if (!empty($req->query->orden) && ($req->query->orden == "edad")){
            $valor_orden = $req->query->valor;
            if(!empty($valor_orden)){
        if(($valor_orden == "asc") || ($valor_orden == "desc")){
    $ordenado_por_edad = $this->model->OrdenarPor($valor_orden);
    return $this->view->response($ordenado_por_edad, 200);
        }
        else{
           return $this->view->response("Orden solicitado no valido", 404);
        }
    }
        
    }
        else{
    $jugadores = $this->model->ObtenerJugadores();
    return $this->view->response($jugadores, 200);
        }
    }

function ObtenerJugador($req){
    $id = $req->params->id;
    if(!empty($id)){
    $jugador = $this->model->ObtenerJugador($id);
    if (!empty($jugador)){
    return $this->view->response($jugador, 200);
    }
    else{
        return $this->view->response("El jugador con el id ". $id . "no existe", 404);
    }
}
else{
    return $this->view->response("Error el id esta vacio", 400);
}
}
function EliminarJugador($req){
    $id = $req->params->id;
    if(!empty($id)){
    $jugador = $this->model->ObtenerJugador($id);
    if (!empty($jugador)){
        $this->model->BorrarJugador($id);
        return $this->view->response("El jugador con el id " . $id . "fue eliminado", 200);
    }
    else{
        return $this->view->response("El jugador con el id ". $id . "no existe", 404);
    }
}
else{
    return $this->view->response("Error, el id esta vacio", 400);
}
}
 function CrearJugador($req){
    if((!empty($req->body->nombre)) && (!empty($req->body->apellido)) && (!empty($req->body->edad)) && (!empty($req->body->id_club))){
$nombre = $req->body->nombre;
$apellido = $req->body->apellido;
$edad = $req->body->edad;
$id_club = $req->body->id_club;

$nuevo_jugador = $this->model->CrearJugador($nombre,$apellido,$edad,$id_club);
$this->view->response("Jugador creado con exito con el id = " . $nuevo_jugador, 201);
    }
    else{
        return $this->view->response("Falta completar datos", 400);
    }
}
function EditarJugador($req){
    $id_jugador = $req->params->id;

    if(!empty($id_jugador)){
    $jugador_encontrado = $this->model->ObtenerJugador($id_jugador);

    if (!empty($jugador_encontrado)){
        $nombre = $req->body->nombre;
        $apellido = $req->body->apellido;
        $edad = $req->body->edad;
        $id_club = $req->body->id_club;
       if ((!empty($nombre)) && (!empty($apellido)) && (!empty($edad)) && (!empty($id_club))) {
        $this->model->EditarJugador($nombre,$apellido,$edad,$id_club, $id_jugador);
        return $this->view->response("Jugador editado correctamente", 200);
        }
        else{
            return $this->view->response("Falta completar datos", 400);
        } 
    }
    else{
     return $this->view->response("No existe un jugador con ese id", 404);   
    }
}
else{
    return $this->view->response("Error, el id esta vacio", 400);
}

}
}
?>