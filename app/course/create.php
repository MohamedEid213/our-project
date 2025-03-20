<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/navbar.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/vendor/config.php');

$SelectDepartment = 'SELECT * FROM `departments`';
$AllDepartment = mysqli_query($conn, $SelectDepartment);

    $SelectInstructors = 'SELECT `id`, `Name` FROM `instructors`';
    $AllData= mysqli_query($conn, $SelectInstructors);
        $AllInstructors = mysqli_fetch_all($AllData,MYSQLI_ASSOC);
        
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $credit = $_POST['credit'];
    $instructor_id = $_POST['instr'];
    $department_id = $_POST['depart'];




    $Add = "INSERT INTO `courses`(`title`,`credit`,`instructor_id`,`Department_id`) VALUES ('$name','$credit','$instructor_id','$department_id') ";
    $All = mysqli_query($conn, $Add);
    mysqli_close($conn);
    header('location: /our-project/app/course/');
    exit();
}
?>

<body>


    <section class="container col-md-5 my-5">
        <h1 class="text-strat  fw-bold my-4">Add Courses
            <a href="./index.php" class="btn btn-dark float-end"> List Courses</a>
        </h1>
        <div class="card shadow px-5 py-3 bg-dark text-light">
            <form method="post">

                <div class="form-group ">
                    <label for="name">Enter Name Of Courses:</label>
                    <input type="text" name="name" id="name" class="form-control mt-1" autofocus>
                    <label for="credit">Enter Credit Of Courses:</label>
                    <input type="number" name="credit" id="credit" class="form-control mt-1">
                    <label for="instr">Choose of Instructors :</label>
                    <select name="instr" id="instr" class="form-control mt-1">

                    <?php foreach ($AllInstructors as $instructor) : ?>

                        <option value="<?= $instructor['id'] ?>"> <?= $instructor['Name'] ?></option>
                    <?php endforeach ?>


                    </select>

                    <label for="depart">Choose Of Depratments:</label>
                    <select name="depart" id="deprat" class="form-control mt-1">

                        <?php foreach ($AllDepartment as $department) : ?>

                            <option value="<?= $department['id'] ?>"> <?= $department['title'] ?></option>
                        <?php endforeach ?>


                    </select>

                    <button name='submit' class="btn btn-primary mx-auto mt-3 d-block px-5">send</button>
                </div>
            </form>

        </div>
    </section>



    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/script.php');
    ?>
</body>

</html>