<?php
include 'conexion_BD.php';
 $ID=$_POST['id'];
 $FechaInicio=$_POST['start_date'];
 $FechaFinal=$_POST['end_date'];
 $HoraFinal=$_POST['end_hour'];
 $HoraInicial=$_POST['start_hour'];

 CrearEvento();

 function CrearEvento(){
   IniciarConexion();
   $Consulta = "update evento set fechaInicio='".$GLOBALS['fechaInicio']."', horaInicio='".$GLOBALS['horaInicio']."', fechaFin='".$GLOBALS['FechaFinal']."', horaFin='".$GLOBALS['HoraFinal']."'
   where id=".$GLOBALS['ID'];

   if ($GLOBALS['Conexion']->query($Consulta) === TRUE) {
       echo json_encode(array("msg"=>"OK"));
   } else {
       echo json_encode(array("msg"=>"Error Al registrar el evento"));
   }
   DesactivarConexion();
 }


 ?>
