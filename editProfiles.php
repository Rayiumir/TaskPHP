<?php

session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == "user") {
    include ('db.php');
    include ('app/Model/User.php');
    $user = get_user_by_id($conn, $_SESSION['id']);

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

                    <div class="col-md-4 offset-md-3">
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
                                <form action="app/updateProfile.php" method="POST">
                                    <div class="mb-3">
                                        <label for="Input1" class="form-label">Full Name</label>
                                        <input type="text" class="form-control rounded-5" name="name" id="Input1" value="<?=$user['name']?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Input1" class="form-label">New Password</label>
                                        <input type="text" class="form-control rounded-5" name="newPassword" id="Input1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Input1" class="form-label">Confirm Password</label>
                                        <input type="text" class="form-control rounded-5" name="confirmPassword" id="Input1">
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary rounded-5" type="button"><i class="fa-duotone fa-send"></i> Update Profile </button>
                                    </div>
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