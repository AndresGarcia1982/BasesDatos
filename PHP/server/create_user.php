<?php

include 'conexion_BD.php';
    CrearUsuarios("Leandro","Allen","qwert","leandroallen@gmail.com");
    CrearUsuarios("Carlos","Aguirre","12345","carlos1245@yahoo.com");
    CrearUsuarios("Santiago","Anago","password","sanana987@hotmail.com");

    function CrearUsuarios($Nombre,$Apellido,$Password,$UserName){
    IniciarConexion();
    $Consulta="Select * from usuario where correoUs='".$UserName."'";
    $Resultado= mysqli_num_rows($GLOBALS['Conexion']->query($Consulta));
    if($Resultado==0){
        $Consulta = "INSERT INTO usuario (nombreUs, apellidoUs, claveUs, correoUs)
        VALUES ('".$Nombre."', '".$Apellido"', '".password_hash($Password, PASSWORD_BCRYPT)."', '".$UserName."' )";

        if ($GLOBALS['Conexion']->query($Consulta) === TRUE) {
            echo "Nuevo registro ingresado";
        } else {
            echo "Error: " . $sql . "<br>" . $GLOBALS['Conexion']->error;
        }
    }
    DesactivarConexion();
    }



 ?>
