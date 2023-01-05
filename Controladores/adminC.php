<?php

class AdminC{

    //Ingreso Administrador
    public function IngresarAdminC(){

        if(isset($_POST["usuario-Ing"])){

            if(preg_match('/^[a-zA-z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-zA-z0-9]+$/', $_POST["clave-Ing"])){

                $tablaBD = "administradores";

                $datosC = array("usuario" => $_POST["usuario-Ing"], "clave" => $_POST["clave-Ing"]);

                $resultado = AdminM::IngresarAdminM($tablaBD, $datosC);

                if($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]){

                    $_SESSION["Ingresar"] = true;

                    $_SESSION["id"] = $resultado["id"];
                    $_SESSION["usuario"] = $resultado["usuario"];
                    $_SESSION["clave"] = $resultado["clave"];
                    $_SESSION["nombre"] = $resultado["nombre"];
                    $_SESSION["apellido"] = $resultado["apellido"];
                    $_SESSION["foto"] = $resultado["foto"];
                    $_SESSION["rol"] = $resultado["rol"];

                    echo '<script>
                    
                    window.location = "inicio";

                    </script>';

                }else{

                    echo 'Error al ingresar';
                    
                }

            }

        }

    }


    //Ver perfil de Administrador
    public function VerPerfilAdminC(){

        $tablaBD = "administradores";

        $id = $_SESSION["id"];

        $resultado = AdminM::VerPerfilAdminM($tablaBD, $id);

        echo '<tr>
                <td>'.$resultado["usuario"].'</td>
                <td>'.$resultado["clave"].'</td>
                <td>'.$resultado["nombre"].'</td>
                <td>'.$resultado["apellido"].'</td>';

                if($resultado["foto"] != ""){

                    echo '<td><img src="'.$resultado["foto"].'"class="img-responsive" width="40px"></td>';

                }else{

                    echo '<td><img src="http://localhost/clinica/Vistas/img/defecto.png" class="img-responsive" width="40px"></td>';
                }

                echo '<td>
                    <a href="http://localhost/clinica/perfil-A/'.$resultado["id"].'">
                        <button class="btn btn-success" type=""><i class="fa fa-pencil"></i></button>
                    </a>
                </td>
            </tr>';
    }



    //Editar perfil
    public function EditarPerfilAdminC(){

        $tablaBD = "administradores";

        $id = $_SESSION["id"];

        $resultado = AdminM::VerPerfilAdminM($tablaBD, $id);

        echo '<form method="post" enctype="multipart/form-data">

                <div class="row">

                    <div class="col-md-6 col-xs-12">

                        <h2>Nombre:</h2>
                        <input type="text" class="input-lg" name="nombreP" value="'.$resultado["nombre"].'">
                        <input type="hidden" class="input-lg" name="Aid" value="'.$resultado["id"].'">

                        <h2>Apellido:</h2>
                        <input type="text" class="input-lg" name="apellidoP" value="'.$resultado["apellido"].'">

                        <h2>Usuario:</h2>
                        <input type="text" class="input-lg" name="usuarioP" value="'.$resultado["usuario"].'">

                        <h2>Contraseña:</h2>
                        <input type="text" class="input-lg" name="claveP" value="'.$resultado["clave"].'">

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <br><br>

                        <input type="file" name="imgP">
                        <br>';
                
                        if($resultado["foto"] == ""){

                            echo '<img src="http://localhost/clinica/Vistas/img/defecto.png" width="200px;">';

                        }else{

                            echo '<img src="http://localhost/clinica/'.$resultado["foto"].'" width="200px;">';

                        }
                        

                        echo '<input type="hidden" name="imgActual" value="'.$resultado["foto"].'">

                        <br><br>

                        <button type="submit" class="btn btn-success">Guardar Cambios</button>

                    </div>

                </div>

            </form>';

    }

}