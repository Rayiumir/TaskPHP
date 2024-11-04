<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {

    if (isset($_POST['id']) && isset($_POST['status']) && $_SESSION['role'] == 'user') {
        include "../db.php";

        function validate_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $status = validate_input($_POST['status']);
        $id = validate_input($_POST['id']);

        if (empty($status)) {
            $em = "Status is required";
            header("Location: ../myTasks.php?error=$em&id=$id");
            exit();
        }else {

            include "Model/Task.php";

            $data = array($status, $id);
            updateTaskStatus($conn, $data);

            $em = "Task Status updated successfully";
            header("Location: ../myTasks.php?success=$em&id=$id");
            exit();


        }
    }else {
        $em = "Unknown error occurred";
        header("Location: ../editTaskEm.php?error=$em");
        exit();
    }

}else{
    $em = "First login";
    header("Location: ../login.php?error=$em");
    exit();
}