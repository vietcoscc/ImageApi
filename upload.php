<?php
/**
 * Created by PhpStorm.
 * User: viet
 * Date: 07/08/2017
 * Time: 10:54
 */
include("connection.php");
$con = new Connection();
$connection = $con->getConnection();

if ($connection) {
    $image = $_POST['image'];
    $title = $_POST['title'];
    $upload_path = "upload/$title.jpg";
    if (!empty($image) && !empty($title)) {
        $sql = "INSERT INTO image(path,title) VALUES ('$upload_path','$title')";
        if (mysqli_query($connection, $sql)) {
            file_put_contents($upload_path, base64_decode($image));
        echo json_encode(array('response' => 'image upload successfully !'));
        } else {
        echo json_encode(array('response' => 'image upload failed'));
        }
    }
    mysqli_close($connection);
}
