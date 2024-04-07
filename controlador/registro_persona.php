<?php
if (!empty($_POST['btnregistrar'])) { //si el boton registrar no esta vacio
    if (!empty($_POST['nombre']) and !empty($_POST['apellido']) //si los campos no estan vacios
    and !empty($_POST['dni'])and !empty($_POST['fecha_nacimiento']) 
    and !empty($_POST['correo'])) {;
    
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $correo = $_POST['correo'];
        
        $sql =$conexion->query("INSERT INTO personas(nombre, apellido, dni, fecha_nac, correo) 
        VALUES ('$nombre', '$apellido', '$dni', '$fecha_nacimiento', '$correo')");
        if ($sql==1) {
            echo '<div class = "alert alert-success"> Registro exitoso </div>'; //mensaje de registro exitoso
        } else {
            echo '<div class="alert alert-danger">Error al registrar persona</div>'; //mensaje de error al registrar persona
        }
    } else {
        echo '<div class="alert alert-warning">Complete todos los campos</div>'; //mensaje de completar todos los campos
    }
}
?>