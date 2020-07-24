<?php


namespace Alisa\MarsEstate\Base;

use Alisa\MarsEstate\Base\DBConnection;

abstract class Service
{
    protected $dbConnection;

    public function __construct() {
        $this->dbConnection = DBConnection::getInstance();
    }
    // abstract public function doSomething();
}