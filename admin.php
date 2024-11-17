<?php
    session_start();
    if (isset($_SESSION['role']) && isset($_SESSION['id']) ) {
        include "db.php";
        include "app/Model/Task.php";
        include "app/Model/User.php";

        if (isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == "admin") {
            $Duetoday = countTasksDuetoday($conn);
            $Overdue = countTasksOver($conn);
            $Nodeadline = countTasksNoDeadline($conn);
            $countTasks = countTasks($conn);
            $countUsers = countUsers($conn);
            $Pending = countPendingTasks($conn);
            $Progress = countInProgressTasks($conn);
            $Completed = countCompletedTasks($conn);
        }else {
            $countMyTask = countMyTasks($conn, $_SESSION['id']);
            $countOverdue = countMyTasksOverdue($conn, $_SESSION['id']);
            $countNodeadline = countMyTasksNoDeadline($conn, $_SESSION['id']);
            $countPending = countMyPendingTasks($conn, $_SESSION['id']);
            $countProgress = countMyInProgressTasks($conn, $_SESSION['id']);
            $countCompleted = countMyCompletedTasks($conn, $_SESSION['id']);
        }
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
                    <div class="row">
                        <?php if (isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == "admin") { ?>

                            <div class="col-md-3">
                                <div class="card rounded-4 mb-3 text-bg-secondary">
                                    <div class="card-body">
                                        <div class="row g-0">
                                            <div class="col-md-2 text-center">
                                                <i class="fa-duotone fa-users fa-2x mt-2"></i>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="ms-4">
                                                    <h1 class="fs-6 mt-3 fw-bold">Users <span class="badge text-bg-danger rounded-5"><?= $countUsers; ?></span> </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card rounded-4 mb-3 text-bg-secondary">
                                    <div class="card-body">
                                        <div class="row g-0">
                                            <div class="col-md-2 text-center">
                                                <i class="fa-duotone fa-tasks fa-2x mt-2"></i>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="ms-4">
                                                    <h1 class="fs-6 mt-3 fw-bold">All Tasks <span class="badge text-bg-danger rounded-5"><?= $countTasks; ?></span> </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card rounded-4 mb-3 text-bg-secondary">
                                    <div class="card-body">
                                        <div class="row g-0">
                                            <div class="col-md-2 text-center">
                                                <i class="fa-duotone fa-window-close fa-2x mt-2"></i>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="ms-4">
                                                    <h1 class="fs-6 mt-3 fw-bold">Overdue <span class="badge text-bg-danger rounded-5"><?= $Overdue; ?></span> </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card rounded-4 mb-3 text-bg-secondary">
                                    <div class="card-body">
                                        <div class="row g-0">
                                            <div class="col-md-2 text-center">
                                                <i class="fa-duotone fa-clock fa-2x mt-2"></i>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="ms-4">
                                                    <h1 class="fs-6 mt-3 fw-bold">No Deadline <span class="badge text-bg-danger rounded-5"><?= $Nodeadline; ?></span> </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card rounded-4 mb-3 text-bg-secondary">
                                    <div class="card-body">
                                        <div class="row g-0">
                                            <div class="col-md-2 text-center">
                                                <i class="fa-duotone fa-exclamation-triangle fa-2x mt-2"></i>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="ms-4">
                                                    <h1 class="fs-6 mt-3 fw-bold">Due Today <span class="badge text-bg-danger rounded-5"><?= $Duetoday; ?></span> </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card rounded-4 mb-3 text-bg-secondary">
                                    <div class="card-body">
                                        <div class="row g-0">
                                            <div class="col-md-2 text-center">
                                                <i class="fa-duotone fa-square fa-2x mt-2"></i>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="ms-4">
                                                    <h1 class="fs-6 mt-3 fw-bold">Pending <span class="badge text-bg-danger rounded-5"><?= $Pending; ?></span> </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card rounded-4 mb-3 text-bg-secondary">
                                    <div class="card-body">
                                        <div class="row g-0">
                                            <div class="col-md-2 text-center">
                                                <i class="fa-duotone fa-spinner fa-2x mt-2"></i>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="ms-4">
                                                    <h1 class="fs-6 mt-3 fw-bold">In progress <span class="badge text-bg-danger rounded-5"><?= $Progress; ?></span> </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card rounded-4 mb-3 text-bg-secondary">
                                    <div class="card-body">
                                        <div class="row g-0">
                                            <div class="col-md-2 text-center">
                                                <i class="fa-duotone fa-check-square fa-2x mt-2"></i>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="ms-4">
                                                    <h1 class="fs-6 mt-3 fw-bold">Completed <span class="badge text-bg-danger rounded-5"><?= $Completed; ?></span> </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }else{?>
                            <div class="col-md-3">
                                <div class="card rounded-4 mb-3 text-bg-secondary">
                                    <div class="card-body">
                                        <div class="row g-0">
                                            <div class="col-md-2 text-center">
                                                <i class="fa-duotone fa-tasks fa-2x mt-2"></i>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="ms-4">
                                                    <h1 class="fs-6 mt-3 fw-bold">All Tasks <span class="badge text-bg-danger rounded-5"><?= $countMyTask; ?></span> </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card rounded-4 mb-3 text-bg-secondary">
                                    <div class="card-body">
                                        <div class="row g-0">
                                            <div class="col-md-2 text-center">
                                                <i class="fa-duotone fa-window-close fa-2x mt-2"></i>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="ms-4">
                                                    <h1 class="fs-6 mt-3 fw-bold">Overdue <span class="badge text-bg-danger rounded-5"><?= $countOverdue; ?></span> </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card rounded-4 mb-3 text-bg-secondary">
                                    <div class="card-body">
                                        <div class="row g-0">
                                            <div class="col-md-2 text-center">
                                                <i class="fa-duotone fa-clock fa-2x mt-2"></i>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="ms-4">
                                                    <h1 class="fs-6 mt-3 fw-bold">No Deadline <span class="badge text-bg-danger rounded-5"><?= $countNodeadline; ?></span> </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card rounded-4 mb-3 text-bg-secondary">
                                    <div class="card-body">
                                        <div class="row g-0">
                                            <div class="col-md-2 text-center">
                                                <i class="fa-duotone fa-square fa-2x mt-2"></i>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="ms-4">
                                                    <h1 class="fs-6 mt-3 fw-bold">Pending <span class="badge text-bg-danger rounded-5"><?= $countPending; ?></span> </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card rounded-4 mb-3 text-bg-secondary">
                                    <div class="card-body">
                                        <div class="row g-0">
                                            <div class="col-md-2 text-center">
                                                <i class="fa-duotone fa-spinner fa-2x mt-2"></i>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="ms-4">
                                                    <h1 class="fs-6 mt-3 fw-bold">In progress <span class="badge text-bg-danger rounded-5"><?= $countProgress; ?></span> </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card rounded-4 mb-3 text-bg-secondary">
                                    <div class="card-body">
                                        <div class="row g-0">
                                            <div class="col-md-2 text-center">
                                                <i class="fa-duotone fa-check-square fa-2x mt-2"></i>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="ms-4">
                                                    <h1 class="fs-6 mt-3 fw-bold">Completed <span class="badge text-bg-danger rounded-5"><?= $countCompleted; ?></span> </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- #Page Content -->
    </div>
    <!-- #Wrapper -->
<?php include('parts/footer.php'); ?>
<?php }else{
    header("Location: ../login.php");
    exit();
    }
?>

