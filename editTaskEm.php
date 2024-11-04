<?php

session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == "user") {
    include "db.php";
    include "app/Model/User.php";
    include "app/Model/Task.php";

    if (!isset($_GET['id'])) {
        header("Location: myTasks.php");
        exit();
    }
    $id = $_GET['id'];
    $task = get_task_by_id($conn, $id);

    if ($task == 0) {
        header("Location: myTasks.php");
        exit();
    }
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
                <div class="p-5 mt-5">
                    <div class="col-md-6 offset-md-3">
                        <div class="card rounded-4">
                            <div class="card-body">
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
                                <form action="app/updateTaskUser.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="Input1" class="form-label">Title</label>
                                                <p><?=$task['title']?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="Input2" class="form-label">Status</label>
                                                <select name="status" class="form-control rounded-5">
                                                    <option<?php if( $task['status'] == "pending") echo"selected"; ?> >pending</option>
                                                    <option <?php if( $task['status'] == "in_progress") echo"selected"; ?>>in_progress</option>
                                                    <option <?php if( $task['status'] == "completed") echo"selected"; ?>>completed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="Input2" class="form-label">Description</label>
                                                <p><?=$task['description']?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" name="id" value="<?=$task['id']?>" hidden>
                                    <button type="submit" class="btn btn-primary rounded-5"><i class="fa-duotone fa-send"></i> Submit </button>
                                </form>
                            </div>
                        </div>
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
} ?>