<?php

session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == "admin") {
    require_once "db.php";
    require_once "app/Model/User.php";

    if (!isset($_GET['id'])) {
        header("Location: users.php");
        exit();
    }
    $id = $_GET['id'];
    $user = get_user_by_id($conn, $id);

    if ($user == 0) {
        header("Location: users.php");
        exit();
    }

    $data = array($id, "user");
    deleteUser($conn, $data);
    $sm = "Deleted Successfully";
    header("Location: users.php?success=$sm");
    exit();

} else {
    header("Location: users.php");
    exit();
}

