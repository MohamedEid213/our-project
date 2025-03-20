<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/navbar.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/vendor/config.php');

if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);

    $Show = "SELECT * FROM  `enrollments`  WHERE `id` = $id";
    $Query = mysqli_query($conn, $Show);
    $Row = mysqli_fetch_assoc($Query);

    $SelectStudents = 'SELECT `id`,`name` FROM `students`';
    $AllStudents = mysqli_query($conn, $SelectStudents);

    $SelectCourses = 'SELECT `id`, `title` FROM `courses`';
    $AllCourses = mysqli_query($conn, $SelectCourses);


    if (isset($_POST['edit'])) {
        $grade = $_POST['grade'];
        $date = $_POST['date'];
        $student_id = $_POST['student'];
        $course_id = $_POST['course'];
        $edit = "UPDATE `enrollments` SET `grade`='$grade' ,`enrollment_date` = '$date', `student_id` ='$student_id ', `course_id` ='$course_id' WHERE `id` = $id";
        $Query = mysqli_query($conn, $edit);
        header('location: /our-project/app/enrollment/');
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

                <select name="student" class="form-control  my-1">

                    <?php foreach ($AllStudents as $student) : ?>
                        <?php if ($student['id'] == $Row['student_id']): ?>
                            <option value="<?= $student['id'] ?>" selected> <?= $student['name'] ?> </option>
                        <?php else : ?>
                            <option value="<?= $student['id'] ?>"> <?= $student['name'] ?> </option>
                        <?php endif ?>
                    <?php endforeach ?>

                </select>

                <select name="course" class="form-control my-1">

                    <?php foreach ($AllCourses as $course) : ?>
                        <?php if ($course['id'] == $Row['course_id']): ?>
                            <option value="<?= $course['id'] ?>" selected> <?= $course['title'] ?> </option>
                        <?php else : ?>
                            <option value="<?= $course['id'] ?>"> <?= $course['title'] ?> </option>
                        <?php endif ?>
                    <?php endforeach ?>

                </select>

                <input type="number" name="grade" value="<?= $Row['grade'] ?>" class="fw-bold py-2 my-1">
                <input type="date" name="date" value="<?= $Row['enrollment_date'] ?>" class="fw-bold py-2 my-1">


                <button class="btn btn-primary mt-4 " name='edit'>Edit</button>
            </div>
        </form>
    </section>



    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/script.php');
    ?>
</body>

</html>