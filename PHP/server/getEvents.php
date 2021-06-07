<?php

include 'conexion_BD.php';
  ObtenerEventos();
  function ObtenerEventos(){
     $Eventos="";
     IniciarConexion();
     $Consulta="select * from evento where id_usuario=3";
     $Resultado= $GLOBALS['Conexion']->query($Consulta);
     while ($fila = mysqli_fetch_array($Resultado)){
       if(empty($Eventos)){
          $Eventos="[".json_encode(array("id"=> $fila['id'], "title"=> $fila['yitulo'], "start"=> $fila['fechaInicio']." ". $fila['horaInicio'], "end"=> $fila['fechaFin']." ".$fila['horaFin']));
        }else{
          $Eventos=$Eventos.",".json_encode(array("id"=> $fila['Id'], "title"=> $fila['Titulo'], "start"=> $fila['fechaInicio']." ". $fila['horaInicio'], "end"=> $fila['fechaFin']." ".$fila['horaFin']));
        }
      }
      if(!empty($Eventos)){
        $Eventos=$Eventos."]";
      }
     DesactivarConexion();
     echo $Eventos;

  }



 ?>
