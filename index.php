<?php
    session_start();
    if (isset($_SESSION['role']) && isset($_SESSION['id']) ) {

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
                        <div class="col-md-3">
                            <div class="card rounded-4 mb-3 bg-info text-white">
                                <div class="card-body">
                                    <div class="row g-0">
                                        <div class="col-md-3 text-center">
                                            <i class="fa-duotone fa-users fa-4x"></i>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="ms-3">
                                                <h1 class="fw-bold">Users</h1>
                                                <div class="mt-4 fw-bold">1000</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card rounded-4 mb-3 bg-secondary text-white">
                                <div class="card-body">
                                    <div class="row g-0">
                                        <div class="col-md-3 text-center">
                                            <i class="fa-duotone fa-text fa-4x"></i>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="ms-3">
                                                <h1 class="fw-bold">Posts</h1>
                                                <div class="mt-4 fw-bold">200</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card rounded-4 mb-3 bg-warning text-white">
                                <div class="card-body">
                                    <div class="row g-0">
                                        <div class="col-md-3 text-center">
                                            <i class="fa-duotone fa-comments fa-4x"></i>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="ms-3">
                                                <h1 class="fw-bold">Comments</h1>
                                                <div class="mt-4 fw-bold">2000</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card rounded-4 mb-3 bg-success text-white">
                                <div class="card-body">
                                    <div class="row g-0">
                                        <div class="col-md-3 text-center">
                                            <i class="fa-duotone fa-money-bill-transfer fa-4x"></i>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="ms-3">
                                                <h1 class="fw-bold">Transaction</h1>
                                                <div class="mt-4 fw-bold">$ 1500</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    }
?>

