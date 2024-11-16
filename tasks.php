<?php

session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == "admin") {
    include ('db.php');
    include ('app/Model/Task.php');
    include "app/Model/User.php";
    if (isset($_GET['date']) &&  $_GET['date'] == "Today") {
        $tasks = all_tasks_today($conn);
        $countToday = count_tasks_today($conn);
    }else if (isset($_GET['date']) &&  $_GET['date'] == "Over") {
        $tasks = all_tasks_over($conn);
        $countOver = countTasksOver($conn);
    }else if (isset($_GET['date']) &&  $_GET['date'] == "No Deadline") {
        $tasks = all_tasks_NoDeadline($conn);
        $conutDeadline = countTasksNoDeadline($conn);
    }else{
        $tasks = all_tasks($conn);
        $countTasks = countTasks($conn);
        $countToday = count_tasks_today($conn);
        $countOver = countTasksOver($conn);
        $conutDeadline = countTasksNoDeadline($conn);
    }
    $users = get_all_users($conn);
    $countTasks = countTasks($conn);
    $countToday = count_tasks_today($conn);
    $countOver = countTasksOver($conn);
    $conutDeadline = countTasksNoDeadline($conn);
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
                <a href="tasks.php" type="button" class="btn btn-secondary position-relative rounded-5">
                    <i class="fa-duotone fa-tasks"></i>
                    ALL Tasks
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?=$countTasks;?>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
                <a href="addTask.php" type="button" class="btn btn-primary rounded-5"><i class="fa-duotone fa-plus"></i> Add Task </a>
                <a href="tasks.php?date=Today" type="button" class="btn btn-warning position-relative rounded-5">
                    <i class="fa-duotone fa-exclamation-triangle"></i> Due Today
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?=$countToday;?>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
                <a href="tasks.php?date=Over" type="button" class="btn btn-danger position-relative rounded-5">
                    <i class="fa-duotone fa-solid fa-window-close"></i> Over Due
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?=$countOver;?>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
                <a href="tasks.php?date=Deadline" type="button" class="btn btn-success position-relative rounded-5">
                    <i class="fa-duotone fa-solid fa-clock"></i> No Deadline
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?=$conutDeadline;?>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
                <?php if ($tasks != 0) { ?>
                    <table class="table table-bordered mt-3">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Assigned to</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date AT</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($tasks as $row) { ?>
                            <tr>
                                <th scope="row" width="50px"><?= $row['id']; ?></th>
                                <td width="200px"><?= $row['title']; ?></td>
                                <td width="200px"><?= $row['description']; ?></td>
                                <td width="100px">
                                    <?php
                                    foreach ($users as $user) {
                                        if($user['id'] == $row['assigned_to']){
                                            echo $user['name'];
                                        }}
                                    ?>
                                </td>
                                <td width="100px"><?= $row['status']; ?></td>
                                <td width="100px"><?= $row['date']; ?></td>
                                <td width="100px" class="text-center">
                                    <a href="editTask.php?id=<?= $row['id']; ?>" class="text-decoration-none text-secondary" title="Edit Task"><i class="fa-duotone fa-user-edit"></i></a>
                                    <a href="deleteTask.php?id=<?= $row['id']; ?>" class="text-decoration-none text-danger" title="Delete Task"><i class="fa-duotone fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php }else { ?>
                    <h3 class="text-center mt-4">Empty</h3>
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

