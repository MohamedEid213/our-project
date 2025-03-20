<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/navbar.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/vendor/config.php');

$id = 1;
$Select = 'SELECT * FROM students';
$All = mysqli_query($conn, $Select);

mysqli_close($conn);

?>

<body>


    <section class="container col-md-5 my-5 ">
        <h1 class="text-strat  fw-bold my-4">List Students
            <a href="./create.php" class="btn btn-dark float-end"> Add Students</a>
        </h1>
        <div class="card shadow p-4">

            <table class="table table-dark table-striped">
                <tr>
                    <th class="text-danger fs-4">id</th>
                    <th class="text-danger fs-4">Name</th>
                    <th class="text-danger fs-4" colspan="3">Actions</th>

                </tr>

                <?php foreach ($All as $student) : ?>
                    <tr>
                        <td> <?= $id++; ?> </td>
                        <td> <?= $student['name'] ?></td>
                        <td><a href="./show.php?id=<?= base64_encode($student['id']) ?>"><i class="fa-solid fa-eye"></i></a></td>
                        <td><a href="./eidt.php?id=<?= base64_encode($student['id']) ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="./delete.php?id=<?= base64_encode($student['id']) ?>"><i class="fa-solid fa-trash"></i></i></a></td>

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