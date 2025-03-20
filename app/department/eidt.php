<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/navbar.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/vendor/config.php');

if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);

    $ShowDepartment = "SELECT `title` FROM `departments` WHERE `id` = $id";
    $Query = mysqli_query($conn, $ShowDepartment);
    $Row = mysqli_fetch_assoc($Query);


    if (isset($_POST['eidt'])) {
        $eidt = $_POST['eidt'];
        $ShowDepartment = "UPDATE `departments` SET `title`='$eidt' WHERE `id` = $id";
        $Query = mysqli_query($conn, $ShowDepartment);
        header('location: /our-project/app/department/');
        exit();
    }
}
?>

<body>


    <section class="container col-md-5 my-5 ">
        <h1 class="text-strat  fw-bold my-4">Edit Department
            <a href="./index.php" class="btn btn-dark float-end"> List Department</a>
        </h1>
        <form action="" method="post">
            <div class="card shadow p-4 bg-dark text-light">
                <input type="text" name="eidt" value="<?= $Row['title'] ?>" class="fw-bold py-2">
                <button class="btn btn-primary mt-4 ">Eidt</button>
            </div>
        </form>
    </section>



    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/script.php');
    ?>
</body>

</html>