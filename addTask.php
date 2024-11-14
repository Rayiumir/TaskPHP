<?php

session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == "admin") {
include "db.php";
include "app/Model/User.php";

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
                    <h3 class="text-center">Create Task</h3>
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
                            <form action="app/addTask.php" method="POST">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="Input1" class="form-label">Title</label>
                                            <input type="text" class="form-control rounded-5" name="title" id="Input1" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="Input1" class="form-label">Date AT</label>
                                            <input type="date" class="form-control rounded-5" name="date" id="Input1" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="Input2" class="form-label">Assigned to</label>
                                            <select name="assigned_to" class="form-control rounded-5">
                                                <option value="0">Select employee</option>
                                                <?php if ($users !=0) {
                                                    foreach ($users as $user) {?>
                                                        <option value="<?=$user['id']?>"><?=$user['name']?></option>
                                                <?php }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="Input2" class="form-label">Description</label>
                                            <textarea type="text" class="form-control rounded-4" name="description" id="Input2" placeholder=""></textarea>
                                        </div>
                                    </div>
                                </div>
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
    header("Location: login.php");
    exit();
} ?>


