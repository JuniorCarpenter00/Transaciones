<?php
require_once('Data.php');
$log = new Log();
$data = new Data();
$listadotrans =  $data->getList();



if (file_exists("Transacciones.csv")) {
    unlink("Transacciones.csv");
}

$ar = fopen("Transacciones.csv", "a");

foreach ($listadotrans as $trans) {
    fwrite($ar, "$trans->id,$trans->fecha,$trans->monto,$trans->descripcion");
    fwrite($ar, "\n");
}

$log->logger("Se han descargado todas las transacciones");

header("Location: Transacciones.csv");
exit();

