<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 31/08/2017
 * Time: 10:04
 */

require_once ('db_abstract_class.php');

class SujetoAdopcion extends db_abstract_class
{

    private $IdSujetoAdopcion;
    private $Genero;
    private $Edad;
    private $Nombre;
    private $Tama




    protected static function buscarForId($id)
    {
        // TODO: Implement buscarForId() method.
    }

    protected static function buscar($query)
    {
        // TODO: Implement buscar() method.
    }

    protected static function getAll()
    {
        // TODO: Implement getAll() method.
    }

    protected function insertar()
    {
        // TODO: Implement insertar() method.
    }

    protected function editar()
    {
        // TODO: Implement editar() method.
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
}