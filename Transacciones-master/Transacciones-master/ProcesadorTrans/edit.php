<?php
require_once('Data.php');
require_once("log.php");
$data = new Data();
$log = new Log();
if (isset($_GET['id'])) {

    $transaid = $_GET['id'];
    $element = $data->getById($transaid);

    if (isset($_POST['monto'])) {

        $transa = new Transaccion();

        $transa->initialize($transaid, $_POST['fecha'], $_POST['monto'], $_POST['descripcion']);

        $data->update($transaid, $transa);
        $log->logger("Se ha modificado la transaccion con ID <b>$transaid</b>");
        header('Location: index.php');
        exit();
    }
}

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
        <a class="navbar-brand" href="index.php">Volver</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <br>
    <div class="container">
        <div class="card">
            <h5 class="card-header">Agregar Transaccion</h5>
            <div class="card-body">
                <form action="edit.php?id=<?php echo $element->id ?>" method="POST">
                    <div class="form-group">
                        <label for="example-date-input">Fecha</label>
                        <input class="form-control" type="date" id="example-date-input" name="fecha" required value="<?php echo $element->fecha ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Monto</label>
                        <input type="text" class="form-control tf w-input" onkeypress="return check(event)" id="exampleFormControlInput1" name="monto" required value="<?php echo $element->monto ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Descripcion</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" name="descripcion" required value="<?php echo $element->descripcion ?>">
                    </div>
                    <button type="submit" class="btn btn-secondary">Guardar</button>
                </form>
            </div>
        </div>
    </div>

</body>
<script>
    function check(e) {
        tecla = (document.all) ? e.keyCode : e.which;

        if (tecla == 8) {
            return true;
        }

        patron = /[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
    }
</script>

</html>