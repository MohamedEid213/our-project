<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/navbar.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/vendor/config.php');

if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);

    $Show = "SELECT * FROM `courses` WHERE `id` = $id";
    $Query = mysqli_query($conn, $Show);
    $Row = mysqli_fetch_assoc($Query);

    $instructor_id =  $Row['Instructor_id'];
    $SelectInstructor = "SELECT `name` FROM `instructors` WHERE `id`= $instructor_id  ";
    $AllInstructor= mysqli_query($conn, $SelectInstructor);
    $Row_Instructor = mysqli_fetch_assoc($AllInstructor);   

    $department_id =  $Row['Department_id'];
    $SelectDepartment = "SELECT `title` FROM departments WHERE `id`= $department_id ";
    $AllDepartment = mysqli_query($conn, $SelectDepartment);
    $Row_Department = mysqli_fetch_assoc($AllDepartment);



    mysqli_close($conn);
}

?>

<body>


    <section class="container col-md-5 my-5 ">
        <h1 class="text-strat  fw-bold my-4">Show Courses
            <a href="./index.php" class="btn btn-dark float-end"> List Corses</a>
        </h1>
        <div class="card shadow p-4 bg-dark text-light">

            <h3 class="text-center"> Name:<span class="ms-1 text-primary fs-4"><?= $Row['title'] ?></span> </h3>
            <h3 class="text-center">Credit: <span class="ms-1 text-primary fs-4"><?= $Row['credit'] ?></span></h3>
            <h3 class="text-center"> Instructor_Name: <span class="ms-1 text-primary fs-4"><?= $Row_Instructor['name'] ?></span></h3>
            <h3 class="text-center">Department_name:<span class="ms-3 text-primary fs-4"><?= $Row_Department['title'] ?></span></h3>


        </div>
    </section>



    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/script.php');
    ?>
</body>

</html>