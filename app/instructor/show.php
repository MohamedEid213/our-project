<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/navbar.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/vendor/config.php');

if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);

    $ShowInstructors = "SELECT * FROM `instructors` WHERE `id` = $id";
    $Query = mysqli_query($conn, $ShowInstructors);
    $Row_Instructors = mysqli_fetch_assoc($Query);

    $department_id =  $Row_Instructors['Department_id'];
    $SelectDepartment = "SELECT `title` FROM departments WHERE `id`= '$department_id ' ";
    $AllDepartment = mysqli_query($conn, $SelectDepartment);
    $Row_Department = mysqli_fetch_assoc($AllDepartment);



    mysqli_close($conn);
}

?>

<body>


    <section class="container col-md-5 my-5 ">
        <h1 class="text-strat  fw-bold my-4">Show Instructors
            <a href="./index.php" class="btn btn-dark float-end"> List Instructors</a>
        </h1>
        <div class="card shadow p-4 bg-dark text-light">

            <h3 class="text-center"> Name:<span class="ms-1 text-primary fs-4"><?= $Row_Instructors['name'] ?></span> </h3>
            <h3 class="text-center">Gmail: <span class="ms-1 text-primary fs-4"><?= $Row_Instructors['email'] ?></span></h3>
            <h3 class="text-center"> Hire-Date: <span class="ms-1 text-primary fs-4"><?= $Row_Instructors['hire_date'] ?></span></h3>
            <h3 class="text-center">Department_name:<span class="ms-3 text-primary fs-4"><?= $Row_Department['title'] ?></span></h3>


        </div>
    </section>



    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/script.php');
    ?>
</body>

</html>