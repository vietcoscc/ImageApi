<?php
/**
 * Created by PhpStorm.
 * User: viet
 * Date: 11/08/2017
 * Time: 14:50
 */
include("connection.php");
$con = new Connection();
$connection = $con->getConnection();
if ($connection) {
    $id = $_GET['id'];
    $file_path = $_GET['path'];

    if (!empty($id) && !empty($file_path)) {
        $sql = "DELETE FROM image WHERE id = $id";

        if (!mysqli_query($connection, $sql) || !file_exists($file_path)) {
            echo json_encode(array('response' => 'failed'));
        } else {
            if (unlink($file_path)) {
                echo json_encode(array('response' => 'successful'));
            }else{
                echo json_encode(array('response' => 'failed'));
            }
        }
    }
}