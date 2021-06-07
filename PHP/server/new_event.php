<?php

include 'conexion_BD.php';
$Titulo=$_POST['titulo'];
$FechaInicio=$_POST['start_date'];
$FechaFinal=$_POST['end_date'];
$HoraFinal=$_POST['end_hour'];
$HoraInicial=$_POST['start_hour'];

CrearEvento();

function CrearEvento(){
  IniciarConexion();
  $Consulta = "INSERT INTO evento (Titulo, fechaInicio, horaInicio, fechaFin, horaFin, id_usuario)
  VALUES ('".$GLOBALS['Titulo']."', '".$GLOBALS['fechaInicio']."', '".$GLOBALS['horaInicial']."', '".$GLOBALS['fechaFin']."', '".$GLOBALS['horaFin']."', ".$_COOKIE['IdUser'].")";

  if ($GLOBALS['Conexion']->query($Consulta) === TRUE) {
      echo json_encode(array("msg"=>"OK","Id"=>$GLOBALS['Conexion']->insert_id));
  } else {
      echo json_encode(array("msg"=>"Error Al registrar el evento"));
  }
  DesactivarConexion();
}


 ?>
