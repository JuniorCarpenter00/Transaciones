<?php

require_once('Data.php');

$data = new Data();
$listadotrans =  $data->getList();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transacciones</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <header class="navbar navbar-dark bg-dark shadow-sm">
    <h1 style="color: white;">Procesador de Transacciones</h1>
  </header>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="add.php">Agregar Transaccion</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
          <a class="nav-link" href="import.php">Importar Transacciones<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="viewlog.php">Ver Log <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>
  <br>
  <?php if (empty($listadotrans)) : ?>
    <h1 style="text-align: center;">No hay transacciones</h1>
  <?php else : ?>
    <div class="container">
      <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Fecha</th>
            <th scope="col">Monto</th>
            <th scope="col">Descripcion</th>
            <th scope="col" colspan="2">Mantenimiento</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($listadotrans as $trans) : ?>
            <tr>
              <th scope="row"><?php echo $trans->id ?></th>
              <td><?php echo $trans->fecha ?></td>
              <td><?php echo $trans->monto ?></td>
              <td><?php echo $trans->descripcion ?></td>
              <td><a href="edit.php?id=<?php echo $trans->id ?>" class="btn btn-secondary">Editar</a></td>
              <td><a href="delete.php?id=<?php echo $trans->id ?>" class="btn btn-danger">Borrar</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      <div class="container-fluid col-md-4">
        <a download="Transacciones.csv" href="download.php" class="btn btn-primary" style="color: white;">Descargar transacciones</a>

      </div>
    </div>
  <?php endif ?>
</body>

</html>