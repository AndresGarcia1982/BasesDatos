<?php

$UserName=$_POST['correoUs'];
    $Password=$_POST['claveUs'];
    include 'conexion_BD.php';
    IniciarSesion();
    function IniciarSesion(){
       $Retorno="";
       IniciarConexion();
       $IdUser=0;
       $Nombre="";
       $Consulta="Select * from usuario where correoUs='".$GLOBALS['correoUs']."'";
       $Resultado= $GLOBALS['Conexion']->query($Consulta);
       if(mysqli_num_rows($Resultado)==0){
           $Retorno="Usuario o Contraseña incorrecta";
       }else{
       while ($fila = mysqli_fetch_array($Resultado)){
            if(password_verify($GLOBALS['claveUs'],$fila['claveUs'])){
               $IdUser=$fila['Id'];
               $Nombre=$fila['Nombre'];
               setcookie('IdUser',$IdUser);
               setcookie('Nombre',$Nombre);
               $Retorno="OK";
            }
            else{
                $Retorno="Usuario o Contraseña incorrecta";
            }
        }
       }
       DesactivarConexion();
       echo json_encode(array("msg"=>$Retorno));
    }




 ?>
