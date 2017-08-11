<?php
/**
 * Created by PhpStorm.
 * User: viet
 * Date: 07/08/2017
 * Time: 16:00
 */
include("connection.php");
$con = new Connection();
$connection = $con->getConnection();
if ($connection) {
    $num = $_GET['num'];
    $sql = "SELECT * FROM image LIMIT $num";
    $result = mysqli_query($connection, $sql);
    $arr = array();
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        echo json_encode($arr);
    }
}
