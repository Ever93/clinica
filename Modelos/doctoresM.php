<?php

require_once "ConexionBD.php";

class DoctoresM extends ConexionBD{

    //Crear Doctores
    static public function CrearDoctorM($tablaBD, $datosC){

    $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(apellido, nombre, sexo, id_consultorio, usuario, clave, rol) VALUES(:apellido, :nombre, :sexo, :id_consultorio, :usuario, :clave, :rol)");

    $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
    $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
    $pdo -> bindParam(":sexo", $datosC["sexo"], PDO::PARAM_STR);
    $pdo -> bindParam(":id_consultorio", $datosC["id_consultorio"], PDO::PARAM_INT);
    $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
    $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
    $pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

    if($pdo -> execute()){

    return true;

    }

    $pdo -> close();
    $pdo = null;

    }


    //Mostrar doctores
    static public function VerDoctoresM($tablaBD, $columna, $valor){

		if($columna != null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo->execute();

			return $pdo -> fetchAll();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

			$pdo->execute();

			return $pdo -> fetchAll();

		}

		$pdo -> close();
		$pdo = null;

	}

  //Editar Doctor
  static public function DoctorM($tablaBD, $columna, $valor){

		if($columna != null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo->execute();

			return $pdo -> fetch();

		}
		

		$pdo -> close();
		$pdo = null;

	}


	//Actualizar Doctores
	static public function ActualizarDoctorM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET apellido = :apellido, nombre = :nombre, sexo = :sexo, usuario = :usuario, clave = :clave WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":sexo", $datosC["sexo"], PDO::PARAM_STR);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);

		if($pdo -> execute()){

            return true;

        }

        $pdo -> close();
        $pdo = null;
        
    
	}


	//Eliminar Doctores
	static public function BorrarDoctorM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo ->bindParam(":id", $id, PDO::PARAM_INT);

		if($pdo -> execute()){

            return true;

        }

        $pdo -> close();
        $pdo = null;
        
	}


	//Modelo de Ingreso de Doctor
    static public function IngresarDoctorM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave, apellido, nombre, sexo, foto, rol, id FROM $tablaBD WHERE usuario = :usuario");

        $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

        $pdo -> execute();
        
        return $pdo -> fetch();

        $pdo -> close();
        $pdo = null;

    }

}