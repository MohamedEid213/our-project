<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/navbar.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/vendor/config.php');

if(isset($_GET['id'])){
$id = base64_decode($_GET['id']) ;

$ShowDepartment = "SELECT `title` FROM `departments` WHERE `id` = $id";
$Query = mysqli_query($conn, $ShowDepartment);
$Row = mysqli_fetch_assoc($Query);

}

?>

<body>


    <section class="container col-md-5 my-5 ">
        <h1 class="text-strat  fw-bold my-4">Show Department
            <a href="./index.php" class="btn btn-dark float-end"> List Department</a>
        </h1>
        <div class="card shadow p-4 bg-dark text-light">
            
            <h3 class="text-center"><?= $Row['title'] ?></h3>
        </div>
    </section>



    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/script.php');
    ?>
</body>

</html>