<?php

require('bdconector.php');

$con = new ConectorBD('localhost','agenda','12345');
$respuesta['msg'] = $con->iniciarConexion('agenda');

if ($respuesta['msg'] == 'OK') {
  $condicion = "id='".$_POST['id']."'";
  if($con->eliminarRegistro('evento', $condicion)){
      $respuesta['estado'] = "El evento se ha eliminado exitosamente";
  }else {
      $respuesta['estado'] = "Hubo un error y los datos no se han eliminado";
  }
}else {
  $respuesta['estado'] = "Error E-003 en la comunicación con el servidor";
}
echo json_encode($respuesta);
$con->cerrarConexion();

 ?>
