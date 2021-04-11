<?php
    
    require_once 'data.php';
    require_once("log.php");
    $data = new Data();
    $log = new Log();
    $isContainId = isset($_GET['id']);
 
    if ($isContainId) {
        $transId = $_GET['id'];
        $data->delete($transId);
        $log->logger("Se ha borrado la transaccion con ID <b>$transId</b>");
    }
    header("Location: index.php");
    exit();
?>