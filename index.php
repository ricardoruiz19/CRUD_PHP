<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<h1 class="text-center p-3">Taller CRUD - Registro </h1>
<div class="container-fluid row"><!--agrego container-fluid row -->
    <form class="col-4 p-3" method="POST"><!--agrego col-4 -->
        <h3 class="text-center text-secondary">Registro de personas</h3> <!--agrego titulo de formulario y cambio color -->
        <?php #inicio de codigo php
        include 'modelo/conexion.php'; #incluyo la conexion a la base de datos
        include 'controlador/registro_persona.php'; #incluyo el controlador de registro de personas
        ?>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre de la persona</label>
        <input type="text" class="form-control" name= "nombre"> 
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Apellido de la persona</label>
        <input type="text" class="form-control" name= "apellido">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">DNI de la persona</label>
        <input type="text" class="form-control" name= "dni">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento</label>
        <input type="date" class="form-control" name= "fecha_nacimiento">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Correo</label>
        <input type="text" class="form-control" name= "correo">
      </div>
      <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
    </form>

    <div class="col-8 p-4"><!--col-8: columna de 8 espacios, p4: padding o espacios -->
        <h3 class="text-center text-secondary">Listado de personas</h3>
        <table class="table"><!--agrego tablas de boostrap https://getbootstrap.com/docs/5.3/content/tables/-->
            <thead> 
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">DNI</th>
                <th scope="col">Fecha de nacimiento</th>
                <th scope="col">Correo</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody> <!--agrego cuerpo de la tabla --><!--agrego conexion a la base de datos -->
              <?php #inicio de codigo php
              include 'modelo/conexion.php'; #incluyo la conexion a la base de datos
              $sql = $conexion->query("SELECT * FROM personas"); #selecciono todos los datos de la tabla personas
              #recorrer los datos de la tabla personas y los guardo en la variable datos
              while($datos = $sql->fetch_object()){ ?> <!--cierro php --> 
                  <tr>
                      <td><?= $datos->id_persona ?></td>
                      <td><?= $datos->nombre ?></td>
                      <td><?= $datos->apellido ?></td>
                      <td><?= $datos->dni ?></td>
                      <td><?= $datos->fecha_nac ?></td>
                      <td><?= $datos->correo ?></td>
                      <td> <!--agrego botones de boostrap https://getbootstrap.com/docs/5.3/components/buttons/-->
                          <a href="modificar.php?id=<?= $datos->id_persona ?>" class="btn btn-small btn-warning" ><i class="fa-solid fa-pen-to-square"></i></a> 
                          <a href="" class="btn btn-small btn-danger" ><i class="fa-solid fa-trash"></i>
                      </td>
                  </tr>
              <?php } 
              ?>
              <tr>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>5478964</td>
                <td>17/03/2001</td>
                <td>thornton@hotmail.com</td>
                <td> <!--agrego botones de boostrap https://getbootstrap.com/docs/5.3/components/buttons/-->
                    <a href="" class="btn btn-small btn-warning" ><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="" class="btn btn-small btn-danger" ><i class="fa-solid fa-trash"></i>
                </td>
              </tr>
              <tr>
                <td>Larry</td>
                <td>the Bird</td>
                <td>5748961</td>
                <td>06/07/1998</td>
                <td>bird@yahoo.com</td>
                <td> <!--agrego botones de boostrap https://getbootstrap.com/docs/5.3/components/buttons/-->
                    <a href="" class="btn btn-small btn-warning" ><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="" class="btn btn-small btn-danger" ><i class="fa-solid fa-trash"></i>
                </td>
              </tr>
            </tbody>
        </table>
</div>
<!-- Bootstrap CSS https://getbootstrap.com/ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
