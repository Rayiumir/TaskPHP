<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-center">
        <figure class="imgLogo">
            <img src="../art/Ranger.png" alt="" srcset="">
        </figure>
    </div>
    <div class="text-center p-3">
        <figure class="avatar">
            <img src="img/1.jpg" class="img-fluid" alt="">
        </figure>
        <h2 class="fs-5 fw-bold mt-3"><?=$_SESSION['username']?></h2>
    </div>
    <?php if($_SESSION['role'] == "user"){ ?>
    <div class="text-center mt-3">
        <a href="" class="btn btn-secondary btn-sm rounded-3" title="Edit Profile"><i class="fa-duotone fa-gear"></i></a>
        <a href="logout.php" class="btn btn-danger btn-sm rounded-3" title="Logout"><i class="fa-duotone fa-sign-out"></i></a>
    </div>
    <div class="mt-3 p-3">
        <div class="d-grid gep-3">
            <a href="" class="btn btn-light text-start border-0 rounded-3 mb-2"><i class="fa-duotone fa-home me-2"></i> Dashboard </a>
            <a href="" class="btn btn-light text-start border-0 rounded-3 mb-2"><i class="fa-duotone fa-bell me-2"></i> Notifications </a>
            <a href="tasks.php" class="btn btn-light text-start border-0 rounded-3 mb-2"><i class="fa-duotone fa-tasks me-2"></i> My Tasks </a>
        </div>
    </div>
    <?php }else{ ?>
        <div class="text-center mt-3">
            <a href="" class="btn btn-secondary btn-sm rounded-3" title="Edit Profile"><i class="fa-duotone fa-gear"></i></a>
            <a href="logout.php" class="btn btn-danger btn-sm rounded-3" title="Logout"><i class="fa-duotone fa-sign-out"></i></a>
        </div>
        <div class="mt-3 p-3">
            <div class="d-grid gep-3">
                <a href="" class="btn btn-light text-start border-0 rounded-3 mb-2"><i class="fa-duotone fa-home me-2"></i> Dashboard </a>
                <a href="" class="btn btn-light text-start border-0 rounded-3 mb-2"><i class="fa-duotone fa-bell me-2"></i> Notifications </a>
                <a href="users.php" class="btn btn-light text-start border-0 rounded-3 mb-2"><i class="fa-duotone fa-users me-2"></i> Users </a>
                <a href="tasks.php" class="btn btn-light text-start border-0 rounded-3 mb-2"><i class="fa-duotone fa-tasks me-2"></i> Tasks </a>
            </div>
        </div>
    <?php } ?>
</div>
