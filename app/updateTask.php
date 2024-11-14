<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {

    if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['description']) && isset($_POST['assigned_to']) && $_SESSION['role'] == 'admin' && isset($_POST['date'])) {
        include "../db.php";

        function validate_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $title = validate_input($_POST['title']);
        $description = validate_input($_POST['description']);
        $assigned_to = validate_input($_POST['assigned_to']);
        $date = validate_input($_POST['date']);
        $id = validate_input($_POST['id']);

        if (empty($title)) {
            $em = "Title is required";
            header("Location: ../editTask.php?error=$em&id=$id");
            exit();
        }else if (empty($description)) {
            $em = "Description is required";
            header("Location: ../editTask.php?error=$em&id=$id");
            exit();
        }else if (empty($date)) {
            $em = "Date is required";
            header("Location: ../editTask.php?error=$em&id=$id");
            exit();
        }else if ($assigned_to == 0) {
            $em = "Select ...";
            header("Location: ../editTask.php?error=$em&id=$id");
            exit();
        }else {

            include "Model/Task.php";

            $data = array($title, $description, $assigned_to, $date, $id);
            updateTask($conn, $data);

            $em = "Task Updated successfully";
            header("Location: ../editTask.php?success=$em&id=$id");
            exit();


        }
    }else {
        $em = "Unknown error occurred";
        header("Location: ../editTask.php?error=$em");
        exit();
    }

}else{
    $em = "First login";
    header("Location: ../login.php?error=$em");
    exit();
}