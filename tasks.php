<?php

session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == "admin") {
require_once ('db.php');
require_once ('app/Model/User.php');
$users = get_all_users($conn);
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
                <a href="addTask.php" type="button" class="btn btn-primary rounded-5"><i class="fa-duotone fa-plus"></i> Add Task </a>
                <?php if ($users != 0) { ?>
                    <table class="table table-bordered mt-3">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Role</th>
                            <th scope="col">Created AT</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $row) { ?>
                            <tr>
                                <th scope="row" width="50px"><?= $row['id']; ?></th>
                                <td width="200px"><?= $row['name']; ?></td>
                                <td width="200px"><?= $row['username']; ?></td>
                                <td width="100px"><?= $row['role']; ?></td>
                                <td width="100px"><?= $row['created_at']; ?></td>
                                <td width="100px" class="text-center">
                                    <a href="editUser.php?id=<?= $row['id']; ?>" class="text-decoration-none text-secondary" title="Edit User"><i class="fa-duotone fa-user-edit"></i></a>
                                    <a href="deleteUser.php?id=<?= $row['id']; ?>" class="text-decoration-none text-danger" title="Delete User"><i class="fa-duotone fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php }else { ?>
                    <h3>Empty</h3>
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

