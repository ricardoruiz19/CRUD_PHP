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
        
        $sql =$conexion->query("UPDATE personas SET nombre='$nombre', apellido='$apellido', dni='$dni', fecha_nac='$fecha_nacimiento', correo='$correo' WHERE id_persona = $id"); //modificar datos de la tabla personas
        if ($sql==1) {
            header("Location: index.php");  
        } else {
            echo "<div class='alert alert-danger'>Error al modificar el registro</div>";
           
        }
    
    }else {
        echo "<script> alert('Todos los campos son obligatorios'); </script>";
    }
}
?>