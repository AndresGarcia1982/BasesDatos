<?php

require('bdconector.php');
session_start();

  $datos = array(
    'IdUsuario' => $_SESSION['user_id'],
    'Titulo' => $_POST['titulo'],
    'FechaInicio' => $_POST['start_date'],
    'HoraInicio' => $_POST['start_hour'],
    'FechaFinalizacion' => $_POST['end_date'],
    'HoraFinalizacion' => $_POST['end_hour'],
    'DiaCompleto' => $_POST['allDay']);

  $con = new ConectorBD('localhost','agenda','12345');
  $respuesta['msg'] = $con->iniciarConexion('agenda');

  if ($respuesta['msg'] == 'OK') {
    if($con->insertarRegistro('evento', $datos)){
      $respuesta['estado'] = "El evento se ha agregado exitosamente";
    }else {
      $respuesta['estado'] = "Hubo un error y los datos no han sido cargados";
    }
  }else {
    $respuesta['estado'] = "Error PHP-001 en la comunicación con el servidor";
  }

  echo json_encode($respuesta);
  $con->cerrarConexion();

?>
