<?php

session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {
    include ('db.php');
    include ('app/Model/Task.php');
    include ('app/Model/User.php');
    $tasks = get_all_tasks_id($conn, $_SESSION['id']);
?>
<?php include ('parts/head.php'); ?>
<body>
<!-- Wrapper -->
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <?php include ('parts/sidebar.php') ?>
    <!-- #Sidebar -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <!-- Navbar -->
        <?php include ('parts/navbar.php') ?>
        <!-- #Navbar -->
        <div class="container">
            <div class="card-body mt-5">
                <?php if(isset($_GET['success'])) {?>
                    <div class="alert alert-success rounded-4 mb-3" role="alert">
                        <?php echo stripcslashes($_GET['success']) ?>
                    </div>
                <?php } ?>
                <?php if(isset($_GET['error'])) {?>
                    <div class="alert alert-danger rounded-4 mb-3" role="alert">
                        <?php echo stripcslashes($_GET['error']) ?>
                    </div>
                <?php } ?>
                <?php if ($tasks != 0) { ?>
                    <table class="table table-bordered mt-3">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created AT</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($tasks as $row) { ?>
                            <tr>
                                <th scope="row" width="50px"><?= $row['id']; ?></th>
                                <td width="200px"><?= $row['title']; ?></td>
                                <td width="200px"><?= $row['description']; ?></td>
                                <td width="100px"><?= $row['status']; ?></td>
                                <td width="100px"><?= $row['date']; ?></td>
                                <td width="100px" class="text-center">
                                    <a href="editTaskEm.php?id=<?= $row['id']; ?>" class="text-decoration-none text-secondary" title="Edit Task"><i class="fa-duotone fa-user-edit"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php }else { ?>
                    <h3 class="mt-3 text-center fs-4 fw-bold">Empty</h3>
                <?php  } ?>
            </div>
        </div>
    </div>
    <!-- #Page Content -->
</div>
<!-- #Wrapper -->
<?php include('parts/footer.php'); ?>
<?php }else{
    header("Location: login.php");
    exit();
} ?>

