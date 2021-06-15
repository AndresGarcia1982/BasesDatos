<?php
require('bdconector.php');

$datos = array(
'FechaInicio' => $_POST['start_date'],
'HoraInicio' => $_POST['start_hour'],
'FechaFinalizacion' => $_POST['end_date'],
'HoraFinalizacion' => $_POST['end_hour']);

$con = new ConectorBD('localhost','agenda','12345');
$respuesta['msg'] = $con->iniciarConexion('agenda');

if ($respuesta['msg'] == 'OK') {
  $condicion = 'id="'.$_POST['id'].'"';
  if($con->actualizarRegistro('evento', $datos, $condicion)){
      $respuesta['estado'] = "El evento se ha actualizado exitosamente";
  }else {
      $respuesta['estado'] = "Hubo un error y los datos no se han actualizado";
  }
}
echo json_encode($respuesta);
$con->cerrarConexion();

?>
