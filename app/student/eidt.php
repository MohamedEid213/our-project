<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/navbar.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/vendor/config.php');

if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);

    $Show = "SELECT * FROM  `students`  WHERE `id` = $id";
    $Query = mysqli_query($conn, $Show);
    $Row = mysqli_fetch_assoc($Query);

    $SelectDepartment = 'SELECT * FROM departments';
    $result = mysqli_query($conn, $SelectDepartment);
    $AllDepartment = mysqli_fetch_all($result, MYSQLI_ASSOC);



    if (isset($_POST['edit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $department_id = $_POST['depart'];
        $edit = "UPDATE `students` SET `name`='$name' ,`email` = '$email', `date_of_birth` ='$date', `department_id` ='$department_id' WHERE `id` = $id";
        $Query = mysqli_query($conn, $edit);
        header('location: /our-project/app/student/');
        exit();
    }
}
?>

<body>


    <section class="container col-md-5 my-5 ">
        <h1 class="text-strat  fw-bold my-4">Edit Students
            <a href="./index.php" class="btn btn-dark float-end"> List Students</a>
        </h1>
        <form action="" method="post">
            <div class="card shadow p-4 bg-dark text-light">
                <input type="text" name="name" value="<?= $Row['name'] ?>" class="fw-bold py-2">
                <input type="email" name="email" value="<?= $Row['email'] ?>" class="fw-bold py-2">
                <input type="date" name="date" value="<?= $Row['date_of_birth'] ?>" class="fw-bold py-2">

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