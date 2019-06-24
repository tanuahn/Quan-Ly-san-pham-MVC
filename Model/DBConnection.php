<?php
/**
 * Created by PhpStorm.
 * User: tuan
 * Date: 24/06/19
 * Time: 13:55
 */

namespace Model;
use PDO;


class DBConnection
{
    public $dsn;
    public $userName;
    public $password;

    public function __construct($dsn, $userName, $password)
    {
        $this->dsn = $dsn;
        $this->userName = $userName;
        $this->password = $password;
    }

    public function connect()
    {
        return new PDO($this->dsn, $this->userName, $this->password);
    }
}