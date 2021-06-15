<?php

require('bdconector.php');

$datos = array(
  'Nombre' => 'Andres Garcia',
  'FechaNacimiento' => '1982-03-02',
  'Username' => 'andres@gmail.com',
  'Password' => password_hash("123", PASSWORD_DEFAULT));

$con = new ConectorBD('localhost','agenda','12345');
$respuesta = $con->iniciarConexion('agenda');

if ($respuesta == 'OK') {
  if($con->insertarRegistro('usuario', $datos)){
      $respuesta = "exito en la insercion";
  }else {
      $respuesta = "Hubo un error y los datos no han sido cargados";
  }
}else {
  $respuesta = "No se pudo conectar a la base de datos";
}
echo json_encode($respuesta);
$con->cerrarConexion();

?>
