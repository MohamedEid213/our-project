<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/navbar.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/vendor/config.php');

$SelectDepartment = 'SELECT * FROM departments';
$AllDepartment = mysqli_query($conn, $SelectDepartment);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $hire_date = $_POST['date'];
    $department_id = $_POST['depart'];




    $Add_Instructor = "INSERT INTO `instructors`(`name`,`email`,`hire_date`,`department_id`) VALUES ('$name','$email','$hire_date','$department_id') ";
    $All_Instructor = mysqli_query($conn, $Add_Instructor);
    mysqli_close($conn);
    header('location: /our-project/app/instructor/');
    exit();
}
?>

<body>


    <section class="container col-md-5 my-5">
        <h1 class="text-strat  fw-bold my-4">Add Instructors
            <a href="./index.php" class="btn btn-dark float-end"> List Instructors</a>
        </h1>
        <div class="card shadow px-5 py-3 bg-dark text-light">
            <form method="post">

                <div class="form-group ">
                    <label for="name">Enter Name Of Instructors:</label>
                    <input type="text" name="name" id="name" class="form-control mt-1" autofocus>
                    <label for="email">Enter email Of Instructors:</label>
                    <input type="email" name="email" id="email" class="form-control mt-1">
                    <label for="date">Enter Hire Date Of Instructors:</label>
                    <input type="date" name="date" id="date" class="form-control my-1">
                    <label for="depart">Choose Of Depratments:</label>
                    <select name="depart" id="deprat" class="form-control mt-1">

                        <?php foreach ($AllDepartment as $department) : ?>

                            <option value="<?= $department['id'] ?>"> <?= $department['title'] ?></option>
                        <?php endforeach ?>


                    </select>

                    <button name='submit'class="btn btn-primary mx-auto mt-3 d-block px-5">send</button>
                </div>
            </form>

        </div>
    </section>



    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/script.php');
    ?>
</body>

</html>