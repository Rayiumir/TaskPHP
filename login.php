<?php include ('parts/head.php') ?>
<body>

    <div class="container">
        <div class="col-md-6 offset-md-3 mt-5">
            <div class="card rounded-4">
                <div class="card-body">
                    <h2 class="text-center fs-5 fw-bold">Login</h2>
                    <div class="mt-4">
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control rounded-5" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control rounded-5" id="exampleInputPassword1">
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

    <!-- Script -->
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/all.js"></script>
</body>
</html>
