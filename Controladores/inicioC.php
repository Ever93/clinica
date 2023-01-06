<?php

class InicioC{

    public function MostrarInicioC(){

        $tablaBD = "inicio";

        $id = "1";

        $resultado = InicioM::MostrarInicioM($tablaBD, $id);

        echo '<div class="box-body">
          
                <div class="col-md-6 bg-primary" style="margin-top: 5%">
                <h1>Bienvenidos</h1>

                <h3>'.$resultado["intro"].'</h3>

                <hr>

                <h2>Horario:</h2>
                <h3>Desde: '.$resultado["horarioE"].'</h3>
                <h3>Hasta: '.$resultado["horarioS"].'</h3>

                <hr>

                <h2>Direccion:</h2>
                <h3>'.$resultado["direccion"].'</h3>

                <hr>

                <h2>Contacto:</h2>
                <h3>Telefono: '.$resultado["telefono"].'<br>
                Correo: '.$resultado["correo"].'</h3>

                </div>

                <div class="col-md-6">
                <<img src="Vistas/img/logo.png" class="img-responsive">
                </div>

            </div>';

    }

}