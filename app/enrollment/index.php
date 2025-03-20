<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/navbar.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/vendor/config.php');

$id = 1;
$Select = "SELECT e.*, s.Name as student_name, c.title as course_title 
FROM enrollments e 
JOIN students s ON s.id = e.student_id  
JOIN courses c ON c.id = e.course_id";
$All = mysqli_query($conn, $Select);






    mysqli_close($conn);

?>

<body>


    <section class="container col-md-5 my-5 ">
        <h1 class="text-strat  fw-bold my-4">List Enrollments
            <a href="./create.php" class="btn btn-dark float-end"> Add Enrollments</a>
        </h1>
        <div class="card shadow p-4">

            <table class="table table-dark table-striped">
                <tr>
                    <th class="text-danger fs-4">id</th>
                    <th class="text-danger fs-4">Name</th>
                    <th class="text-danger fs-4">Course</th>
                    <th class="text-danger fs-4">Grade</th>

                    <th class="text-danger fs-4" colspan="3">Actions</th>

                </tr>

                <?php foreach ($All as $enrollment) : ?>
                    <tr>
                        <td> <?= $id++; ?> </td>
                        <td> <?= $enrollment['student_name'] ?></td>
                        <td> <?= $enrollment['course_title'] ?></td>
                        <td> <?= $enrollment['grade'] ?></td>

                        <td><a href="./show.php?id=<?= base64_encode($enrollment['id']) ?>"><i class="fa-solid fa-eye"></i></a></td>
                        <td><a href="./eidt.php?id=<?= base64_encode($enrollment['id']) ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="./delete.php?id=<?= base64_encode($enrollment['id']) ?>"><i class="fa-solid fa-trash"></i></i></a></td>

                    </tr>
                <?php endforeach ?>

            </table>

        </div>
    </section>



    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/script.php');
    ?>
</body>

</html>