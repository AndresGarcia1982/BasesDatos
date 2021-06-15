<?php

require('bdconector.php');
session_start();

$con = new ConectorBD('localhost','agenda','12345');
$respuesta['msg'] = $con->iniciarConexion('agenda');

  if ($respuesta['msg']=='OK') {
    $consulta = $con->consultarDatos(['evento'], ['*'], 'INNER JOIN usuario ON evento.IdUsuario='.$_SESSION['user_id']);

    if ($consulta->num_rows <= 0) {
      $respuesta['evento'] = [];
    }else{
      $eventos = array();
      while ($fila = $consulta->fetch_assoc()) {
        $evento = array(
          'id'=>$fila['id'],
          'title'=>$fila['Titulo'],
          'start'=>$fila['FechaInicio'].' '.$fila['HoraInicio'],
          'end'=>$fila['FechaFinalizacion'].' '.$fila['HoraFinalizacion'],
          'allday'=>$fila['DiaCompleto'],
          'user_id'=>$fila['IdUsuario'],);
        array_push($eventos, $evento);
      }
      $respuesta['evento'] = $eventos;
    }
  }else{
    $respuesta['estado'] = "Error PHP-004 en la comunicación con el servidor";
  }

echo json_encode($respuesta);
$con->cerrarConexion();
?>
