<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/vendor/config.php');

if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);

    $Delete_student = "DELETE FROM `students` WHERE `id` = $id";
    $Query = mysqli_query($conn, $Delete_student);
    header('location: /our-project/app/student/');
    exit();

}

