<?php

include 'conexion_BD.php';
    CrearUsuarios("Leandro","Allen","qwert","leandroallen@gmail.com");
    CrearUsuarios("Carlos","Aguirre","12345","carlos1245@yahoo.com");
    CrearUsuarios("Santiago","Anago","password","sanana987@hotmail.com");

    function CrearUsuarios($Nombre,$Apellido,$UserName,$Password){
    IniciarConexion();
    $Consulta="Select * from usuario where Username='".$UserName."'";
    $Resultado= mysqli_num_rows($GLOBALS['Conexion']->query($Consulta));
    if($Resultado==0){
        $Consulta = "INSERT INTO usuario (Nombre, Apellido, UserName, Password)
        VALUES ('".$Nombre."', '".$Apellido."', '".$UserName."','".password_hash($Password, PASSWORD_BCRYPT)."')";

        if ($GLOBALS['Conexion']->query($Consulta) === TRUE) {
            echo "Nuevo registro ingresado";
        } else {
            echo "Error: " . $sql . "<br>" . $GLOBALS['Conexion']->error;
        }
    }
    DesactivarConexion();
    }



 ?>
