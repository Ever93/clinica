<?php

class PacientesC{

    //Crear Pacientes
    public function CrearPacienteC(){

        if(isset($_POST["rolP"])){

            $tablaBD = "pacientes";

            $datosC = array("apellido"=>$_POST["apellido"], "nombre"=>$_POST["nombre"], "documento"=>$_POST["documento"], "usuario"=>$_POST["usuario"], "clave"=>$_POST["clave"], "rol"=>$_POST["rolP"]);

            $resultado = PacientesM::CrearPacienteM($tablaBD, $datosC);

            if($resultado == true){

                echo '<script>
                
                window.location = "pacientes";
                </script>';
            }
        }
    }
}
