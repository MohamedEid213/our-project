<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/navbar.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/vendor/config.php');


if(isset($_POST['title'])){
    $title = $_POST['title'];
    $Add_Department = "INSERT INTO `departments`(`title`) VALUES ('$title') ";
    $AllDepartment = mysqli_query($conn, $Add_Department);
        header('location: /our-project/app/department/');
}
?>

<body>


    <section class="container col-md-5 my-5">
        <h1 class="text-strat  fw-bold my-4">Add department
            <a href="./index.php" class="btn btn-dark float-end"> List Department</a>
        </h1>
        <div class="card shadow px-5 py-3 bg-dark text-light">
            <form method="post">

                <div class="form-group ">
                    <label for="title">Enter Title Of Department:</label>
                    <input type="text" name="title" id="title" class="form-control mt-1" autofocus>

                    <button class="btn btn-primary mx-auto mt-3 d-block px-5">sind</button>
                </div>
            </form>

        </div>
    </section>



    <?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/our-project/shared/script.php');
    ?>
</body>

</html>