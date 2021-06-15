<?php

require('bdconector.php');

$con = new ConectorBD('localhost','agenda','12345');
$respuesta['msg'] = $con->iniciarConexion('agenda');

  if ($respuesta['msg']=='OK') {
      $consulta = $con->consultarDatos(['usuario'], ['Id','Username', 'Password'], 'WHERE Username="'.$_POST['username'].'"');
      if ($consulta->num_rows != 0) {
        $fila = $consulta->fetch_assoc();
        $validarPassword = password_verify($_POST['password'], $fila['Password']);
        if ($validarPassword) {
          $respuesta['acceso'] = 'concedido';
          session_start();
          $_SESSION['user_id'] = $fila['Id'];
          $_SESSION['username'] = $fila['Username'];
        }else{
          echo "Contraseña incorrecta";
        }
    }else{
        echo "Email incorrecto";
    }
  }

  echo json_encode($respuesta);
  $con->cerrarConexion();

 ?>
