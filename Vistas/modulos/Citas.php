<?php

if($_SESSION["id"] != substr($_GET["url"], 6)){

    echo '<script>
    
    window.location = "inicio";
    </script>';

    return;

}

?>

<div class="content-wrapper">

    <section class="content-header">

        <?php

        $columna = "id";
        $valor = substr($_GET["url"], 6);

        $resultado = DoctoresC::DoctorC($columna, $valor);

        if($resultado["sexo"] == "Femenino"){

            echo '<h1><b>Doctora:</b> '.$resultado["nombre"].' '.$resultado["apellido"].'</h1>';

        }else{

            echo '<h1><b>Doctor:</b> '.$resultado["nombre"].' '.$resultado["apellido"].'</h1>';

        }

        $columna = "id";
        $valor = $resultado["id_consultorio"];

        $consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);

        

            echo '<br>
            <h1><b>Consultorio:</b> '.$consultorio[0]['nombre'].'</h1>';
            //Solucion con indice 0 a Warning: Undefined array key "nombre"
        
        

        ?>

    </section>

    <section class="cotent">

        <div class="box">

            <div class="box-body">

            <div id="calendar"></div>

            </div>

        </div>

    </section>

</div>

<div class="modal fade" rol="dialog" id="CitaModal">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post">

                <div class="modal-body">

                    <div class="box-body">

                        <?php
                        $columna = "id";
                        $valor = substr($_GET["url"], 6);

                        $resultado = DoctoresC::DoctorC($columna, $valor);

                        echo '<div class="form-group">     

                                <input type="hidden" name="Did" value="'.$resultado["id"].'">
                                
                            </div>';

                            $columna = "id";
                            $valor = $resultado["id_consultorio"];

                            $consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);

                            echo '<div class="form-group">

                                    <input type="hidden" name="Cid" value="'.$consultorio[0]["id"].'">
            
                                </div>';
                        ?>

                        <div class="form-group">

                            <h2>Seleccionar Paciente:</h2>

                            <?php

                            echo '<select class="form-control input-lg" name="nombreP">
                                <opion>Paciente...</opion>';

                                $columna = null;
                                $valor = null;
                                $resultado = PacientesC::VerPacientesC($columna, $valor);

                                foreach ($resultado as $key => $value) {

                                    echo '<option value="'.$value["apellido"].' '.$value["nombre"].'">'.$value["apellido"].' '.$value["nombre"].'</option>';

                                }
                            ?>
                         
                            </select>
                        </div>

                        <div class="form-group">

                            <h2>Documento:</h2>

                            <input type="text" class="form-control input-lg" name="documentoP" value="">

                        </div>

                        <div class="form-group">

                            <h2>Fecha:</h2>

                            <input type="text" class="form-control input-lg" id="fechaC" value="" readonly>

                        </div>

                        <div class="form-group">

                            <h2>Hora:</h2>

                            <input type="text" class="form-control input-lg" id="horaC" value="" readonly>

                        </div>

                        <div class="form-group">

                            <input type="hidden" class="form-control input-lg" name="fyhIC" id="fyhIC" value="" readonly>

                            <input type="hidden" class="form-control input-lg" name="fyhFC" id="fyhFC" value="" readonly>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Pedir Cita</button>

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                </div>

                <?php

                $enviarC = new CitasC();
                $enviarC -> PedirCitaDoctorC();

                ?>

            </form>

        </div>

    </div>
    
</div>
