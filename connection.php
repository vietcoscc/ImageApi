<?php

/**
 * Created by PhpStorm.
 * User: viet
 * Date: 07/08/2017
 * Time: 10:51
 */
include("config.php");

class Connection
{
    var $connect;

    function __construct()
    {
        $this->connect = mysqli_connect(host, name, password, database) or die("error");
    }

    function getConnection()
    {
        if ($this->connect) {
//            echo "connect success...";
            return $this->connect;
        } else {
//            echo "connect fail....";
            return null;
        }
    }
}