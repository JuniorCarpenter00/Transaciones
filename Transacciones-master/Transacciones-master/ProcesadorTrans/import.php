<?php
require_once("cvs.php");
$cvs = new Csv();
if (isset($_POST['sub'])) {
    
    $cvs->import($_FILES['file']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importar</title>
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
    <form method="POST" enctype="multipart/form-data">
        <div class="container-fluid col-md-6">
            <div class="card">
                <h5 class="card-header">Importar Transacciones</h5>
                <div class="card-body">
                    <input type="file" accept=".csv" name="file" id="file">
                    <br><br>
                    <button type="submit" class="btn btn-success" name="sub">Subir</button>
                </div>

            </div>
        </div>
    </form>
</body>

</html>