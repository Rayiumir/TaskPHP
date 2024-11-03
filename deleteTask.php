<?php

session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == "admin") {
    require_once "db.php";
    require_once "app/Model/Task.php";

    if (!isset($_GET['id'])) {
        header("Location: tasks.php");
        exit();
    }
    $id = $_GET['id'];
    $task = get_task_by_id($conn, $id);

    if ($task == 0) {
        header("Location: tasks.php");
        exit();
    }

    $data = array($id);
    deleteTask($conn, $data);
    $sm = "Deleted Successfully";
    header("Location: tasks.php?success=$sm");
    exit();

} else {
    header("Location: login.php");
    exit();
}