<?php include ('parts/head.php') ?>
<body>
    <div class="container">
        <div class="col-md-6 offset-md-3 mt-5">
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

            <div class="card rounded-4">
                <div class="card-body">
                    <h2 class="text-center fs-5 fw-bold">Login</h2>
                    <div class="mt-4">
                        <form action="app/login.php" method="POST">
                            <div class="mb-3">
                                <label for="Input1" class="form-label">Username</label>
                                <input type="text" name="user_name" class="form-control rounded-5" id="Input1">
                            </div>
                            <div class="mb-3">
                                <label for="Password1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control rounded-5" id="Password1">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-5"><i class="fa-duotone fa-send"></i> Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include ('parts/footer.php') ?>
