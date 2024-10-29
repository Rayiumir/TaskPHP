<?php

session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == "admin") { ?>
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
                    <a href="users.php" type="submit" class="btn btn-light rounded-5 mb-3"><i class="fa-duotone fa-users"></i> Users </a>
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
                            <form action="app/addUser.php" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="Input1" class="form-label">Name</label>
                                            <input type="text" class="form-control rounded-5" name="name" id="Input1" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="Input2" class="form-label">Username</label>
                                            <input type="text" class="form-control rounded-5" name="username" id="Input2" placeholder="">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Input3" class="form-label">Password</label>
                                        <input type="password" class="form-control rounded-5" name="password" id="Input3" placeholder="">
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


