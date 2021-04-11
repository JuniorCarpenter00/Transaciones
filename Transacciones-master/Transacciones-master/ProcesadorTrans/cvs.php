<?php

require_once("data.php");

class Csv
{

     

    public function import($file)
    {
        $datos = new Data();
     $log = new Log();
        move_uploaded_file($file['tmp_name'], "" . $file['name']);
        $fila = 1;
        if (($gestor = fopen($file['name'], "r")) !== FALSE) {
            while (($data = fgetcsv($gestor, 1000, ",")) !== FALSE) {
                $num = count($data);
                $fila++;
                $trans = new Transaccion();
                $trans->initialize(0, $data[0], $data[1], $data[2]);
                $datos->add($trans);
            }
            fclose($gestor);
            $log->logger("Se han importado contactos");
            unlink($file['name']);
            header("Location: index.php");
            exit();
        }
    }
}
