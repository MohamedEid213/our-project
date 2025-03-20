<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/navbar.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/vendor/config.php');

if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);

    $Show = "SELECT * FROM `students` WHERE `id` = $id";
    $Query = mysqli_query($conn, $Show);
    $Row = mysqli_fetch_assoc($Query);

    $department_id =  $Row['Department_id'];
    $SelectDepartment = "SELECT `title` FROM departments WHERE `id`= '$department_id ' ";
    $AllDepartment = mysqli_query($conn, $SelectDepartment);
    $Row_Department = mysqli_fetch_assoc($AllDepartment);



    mysqli_close($conn);
}

?>

<body>


    <section class="container col-md-5 my-5 ">
        <h1 class="text-strat  fw-bold my-4">Show Students
            <a href="./index.php" class="btn btn-dark float-end"> List Students</a>
        </h1>
        <div class="card shadow p-4 bg-dark text-light">

            <h3 class="text-center"> Name:<span class="ms-1 text-primary fs-4"><?= $Row['name'] ?></span> </h3>
            <h3 class="text-center">Gmail: <span class="ms-1 text-primary fs-4"><?= $Row['email'] ?></span></h3>
            <h3 class="text-center"> birth Date: <span class="ms-1 text-primary fs-4"><?= $Row['date_of_birth'] ?></span></h3>
            <h3 class="text-center">Department_name:<span class="ms-3 text-primary fs-4"><?= $Row_Department['title'] ?></span></h3>


        </div>
    </section>



    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/script.php');
    ?>
</body>

</html>