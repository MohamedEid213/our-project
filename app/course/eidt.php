<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/navbar.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/vendor/config.php');

if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);

    $Show = "SELECT * FROM  `courses`  WHERE `id` = $id";
    $Query = mysqli_query($conn, $Show);
    $Row = mysqli_fetch_assoc($Query);

    $SelectDepartment = 'SELECT * FROM departments';
    $result = mysqli_query($conn, $SelectDepartment);
    $AllDepartment = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $SelectInstructors = 'SELECT `id`, `Name` FROM `instructors`';
    $AllData = mysqli_query($conn, $SelectInstructors);
    $AllInstructors = mysqli_fetch_all($AllData, MYSQLI_ASSOC);


    if (isset($_POST['edit'])) {
        $title = $_POST['title'];
        $credit = $_POST['credit'];
        $Instructor_id = $_POST['instr'];
        $department_id = $_POST['depart'];
        $edit = "UPDATE `courses` SET `title`='$title' ,`credit` = '$credit', `Instructor_id` ='$Instructor_id ', `department_id` ='$department_id' WHERE `id` = $id";
        $Query = mysqli_query($conn, $edit);
        header('location: /our-project/app/course/');
        exit();
    }
}
?>

<body>


    <section class="container col-md-5 my-5 ">
        <h1 class="text-strat  fw-bold my-4">Edit Courses
            <a href="./index.php" class="btn btn-dark float-end"> List Courses</a>
        </h1>
        <form action="" method="post">
            <div class="card shadow p-4 bg-dark text-light">
                <input type="text" name="title" value="<?= $Row['title'] ?>" class="fw-bold py-2">
                <input type="number" name="credit" value="<?= $Row['credit'] ?>" class="fw-bold py-2">
                <select name="instr" class="form-control mt-1">

                    <?php foreach ($AllInstructors as $instructor) : ?>
                        <?php if ($instructor['id'] == $Row['Instructor_id']): ?>
                            <option value="<?= $instructor['id'] ?>" selected> <?= $instructor['Name'] ?> </option>
                        <?php else : ?>
                            <option value="<?= $instructor['id'] ?>"> <?= $instructor['Name'] ?> </option>
                        <?php endif ?>
                    <?php endforeach ?>

                </select>
                    <select name="depart" class="form-control mt-1">

                        <?php foreach ($AllDepartment as $department) : ?>
                            <?php if ($department['id'] == $Row['Department_id']): ?>
                                <option value="<?= $department['id'] ?>" selected> <?= $department['title'] ?> </option>
                            <?php else : ?>
                                <option value="<?= $department['id'] ?>">
                                    <?= $department['title'] ?>
                                </option>
                            <?php endif ?>
                        <?php endforeach ?>

                    </select>


                    <button class="btn btn-primary mt-4 " name='edit'>Edit</button>
            </div>
        </form>
    </section>



    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/script.php');
    ?>
</body>

</html>