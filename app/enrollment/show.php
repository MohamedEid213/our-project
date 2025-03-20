<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/navbar.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/vendor/config.php');

if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);

    $Select = "SELECT e.*, s.Name as student_name, c.title as course_title 
FROM enrollments e 
JOIN students s ON s.id = e.student_id  
JOIN courses c ON c.id = e.course_id WHERE e.id = '$id' ";
    $result = mysqli_query($conn, $Select);

    $All = mysqli_fetch_assoc($result);

    mysqli_close($conn);
}

?>

<body>


    <section class="container col-md-5 my-5 ">
        <h1 class="text-strat  fw-bold my-4">Show Enrollments
            <a href="./index.php" class="btn btn-dark float-end"> List Enrollments</a>
        </h1>
        <div class="card shadow p-4 bg-dark text-light">

            <h3 class="text-center"> Student_Name: <span class="ms-1 text-primary fs-4"><?= $All['student_name'] ?></span></h3>
            <h3 class="text-center">Course_name:<span class="ms-3 text-primary fs-4"><?= $All['course_title'] ?></span></h3>
            <h3 class="text-center"> Grade:<span class="ms-1 text-primary fs-4"><?= $All['grade'] ?></span> </h3>
            <h3 class="text-center">Date: <span class="ms-1 text-primary fs-4"><?= $All['enrollment_date'] ?></span></h3>


        </div>
    </section>



    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/script.php');
    ?>
</body>

</html>