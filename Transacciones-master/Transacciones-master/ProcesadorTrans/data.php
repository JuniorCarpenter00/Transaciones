<?php

require_once('transaccion.php');
require_once("log.php");
class Data
{

    private $cookieName;

    public function __construct()
    {

        $this->cookieName = 'transaccion';
    }

    public function getIndexElement($list, $property, $value)
    {
        $index = 0;

        foreach ($list as $key => $item) {
            if ($item->$property == $value) {
                $index = $key;
            }
        }
        return $index;
    }

    public function getList()
    {

        $ListadoTrans = array();

        if (isset($_COOKIE[$this->cookieName])) {

            $ListadoTransDecode = json_decode($_COOKIE[$this->cookieName], false);
            foreach ($ListadoTransDecode as $elementDecode) {
                $element = new Transaccion();
                $element->set($elementDecode, $element);
                array_push($ListadoTrans, $element);
            }
        } else {
            setcookie($this->cookieName, json_encode($ListadoTrans), time() + 8600, "/");
        }
        return $ListadoTrans;
    }

    public function searchProperty($list, $property, $value)
    {
        $filter = [];

        foreach ($list as $item) {
            if ($item->$property == $value) {
                array_push($filter, $item);
            }
        }
        return $filter;
    }

    public function getById($id)
    {
        $ListadoTrans = $this->getList();
        $student = $this->searchProperty($ListadoTrans, 'id', $id)[0];
        return $student;
    }



    public function getLastElement($list)
    {
        $countList = count($list);
        $lastElement = $list[$countList - 1];
        return $lastElement;
    }

    public function add($entity)
    {

        $ListadoTrans = $this->getList();
        $studentId = 1;

        if (!empty($ListadoTrans)) {
            $lastStudent = $this->getLastElement($ListadoTrans);
            $studentId = $lastStudent->id + 1;
        }

        $entity->id = $studentId;


        array_push($ListadoTrans, $entity);

        setcookie($this->cookieName, json_encode($ListadoTrans), time() + 8600, "/");
    }

    public function update($id, $entity)
    {
        $element = $this->getById($id);
        $ListadoTrans = $this->getList();

        $elementIndex = $this->getIndexElement($ListadoTrans, 'id', $id);

        $ListadoTrans[$elementIndex] = $entity;
        setcookie($this->cookieName, json_encode($ListadoTrans), time() + 8600, "/");
    }

    public function delete($id)
    {
        $ListadoTrans = $this->getList();
        $elementIndex = $this->getIndexElement($ListadoTrans, 'id', $id);
        unset($ListadoTrans[$elementIndex]);
        $ListadoTrans = array_values($ListadoTrans);
        setcookie($this->cookieName, json_encode($ListadoTrans), time() + 8600, "/");
    }
}
