<?php

require_once "ConexionBD.php";

class AdminM extends ConexionBD{

    //Ingreso de Administrador
    static public function IngresarAdminM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("SELECT id, usuario, clave, nombre, apellido, foto, rol FROM $tablaBD WHERE usuario = :usuario");

        $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

        $pdo -> execute();
        
        return $pdo -> fetch();

        $pdo -> close();
        $pdo = null;

    }


    //Ver Perfil de Administrador
    static public function VerPerfilAdminM($tablaBD, $id){

        $pdo = ConexionBD::cBD()->prepare("SELECT id, usuario, clave, nombre, apellido, foto FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        $pdo -> execute();
        
        return $pdo -> fetch();

        $pdo -> close();
        $pdo = null;

    }
    
}