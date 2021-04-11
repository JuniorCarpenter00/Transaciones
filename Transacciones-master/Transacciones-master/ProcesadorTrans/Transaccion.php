<?php

class Transaccion{
    public $iid;
    public $fecha;
    public $monto;
    public $descripcion;


    
    public function initialize($id,$fecha,$monto,$descripcion){
        $this->id = $id;
        $this->fecha = $fecha;
        $this->monto = $monto;
        $this->descripcion = $descripcion;
    }  

    public function set($data){
        foreach($data as $key => $value) $this->{$key} = $value;
    }

}
