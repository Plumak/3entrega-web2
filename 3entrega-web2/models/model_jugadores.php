<?php
class JugadoresModel{
    private $db;
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=futbol;charset=utf8', 'root', '');
    }
    function ObtenerJugadores(){
        $query = $this->db->prepare('SELECT * FROM jugadores');
        $query->execute();
       $jugadores =  $query->fetchAll(PDO::FETCH_OBJ);
        return $jugadores;
    }
    function ObtenerJugador($id){
        $query = $this->db->prepare('SELECT * FROM jugadores WHERE id_jugador = ?');
        $query->execute([$id]);
       $jugador =  $query->fetch(PDO::FETCH_OBJ);
        return $jugador;
}
function BorrarJugador($id){
        $query = $this->db->prepare('DELETE FROM jugadores WHERE id_jugador = ?');
        $query->execute([$id]);
}
function CrearJugador($nombre,$apellido,$edad,$id_club){
        $query = $this->db->prepare('INSERT INTO jugadores(nombre,apellido,edad,id_club) values (?,?,?,?)');
        $query->execute([$nombre,$apellido,$edad,$id_club]);
        $jugador = $this->db->LastInsertId();
        return $jugador;
}
function EditarJugador($nombre,$apellido,$edad,$id_club,$id_jugador){
$query = $this->db->prepare('UPDATE jugadores SET nombre = ?, apellido = ?, edad = ?, id_club = ? WHERE id_jugador = ?');
$query->execute([$nombre,$apellido,$edad,$id_club,$id_jugador]);
}
function OrdenarPor($valor_orden){
    $query = $this->db->prepare('SELECT * FROM `jugadores` ORDER BY edad ' . $valor_orden);
    $query->execute();
    $orden = $query->fetchAll(PDO::FETCH_OBJ);
    return $orden;
}
}
?>