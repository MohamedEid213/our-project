<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/vendor/config.php');

if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);

    $DeleteDepartment = "DELETE FROM `departments` WHERE `id` = $id";
    $Query = mysqli_query($conn, $DeleteDepartment);
    header('location: /our-project/app/department/');
    exit();

}

