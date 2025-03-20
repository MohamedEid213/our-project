<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/navbar.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/vendor/config.php');

$SelectStudents= 'SELECT `id`,`name` FROM `students`';
$AllStudents = mysqli_query($conn, $SelectStudents);

$SelectCourses = 'SELECT `id`, `title` FROM `courses`';
$AllCourses = mysqli_query($conn, $SelectCourses);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $grade = $_POST['grade'];
    $date = $_POST['date'];
    $student_id = $_POST['student'];
    $course_id = $_POST['course'];




    $Add = "INSERT INTO `enrollments`(`student_id`,`course_id`,`enrollment_date`,`grade`) VALUES ('$student_id','$course_id','$date','$grade') ";
    $All = mysqli_query($conn, $Add);
    mysqli_close($conn);
    header('location: /our-project/app/enrollment/');
    exit();
}
?>

<body>


    <section class="container col-md-5 my-5">
        <h1 class="text-strat  fw-bold my-4">Add Enrollments
            <a href="./index.php" class="btn btn-dark float-end"> List Enrollments</a>
        </h1>
        <div class="card shadow px-5 py-3 bg-dark text-light">
            <form method="post">

                <div class="form-group ">
                    <label for="student">Choose of Student :</label>
                    
                    <select name="student" id="student" class="form-control mt-1">
                        <?php foreach ($AllStudents as $student) : ?>
                            <option value="<?= $student['id'] ?>"> <?= $student['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                        
                        <label for="course">Choose Of Course :</label>
                        
                        <select name="course" id="course" class="form-control mt-1">
                        <?php foreach ($AllCourses as $course) : ?>
                            <option value="<?= $course['id'] ?>"> <?= $course['title'] ?></option>
                            <?php endforeach ?>
                        </select>

                        <label for="grade">Enter Grade Of Enrollments:</label>
                        <input type="number" name="grade" id="grade" class="form-control mt-1" autofocus>
                        <label for="date">Enter Date Of Enrollments:</label>
                        <input type="date" name="date" id="date" class="form-control mt-1">

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