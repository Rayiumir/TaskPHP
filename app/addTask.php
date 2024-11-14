<?php

session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {

    if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['assigned_to']) && $_SESSION['role'] == 'admin' && isset($_POST['date'])) {
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

        if (empty($title)) {
            $em = "Title is required";
            header("Location: ../addTask.php?error=$em");
            exit();
        }else if (empty($description)) {
            $em = "Description is required";
            header("Location: ../addTask.php?error=$em");
            exit();
        }else if (empty($assigned_to)) {
            $em = "Assigned To is required";
            header("Location: ../addTask.php?error=$em");
            exit();
        }else if (empty($date)) {
            $em = "Date AT is required";
            header("Location: ../addTask.php?error=$em");
            exit();
        }else {

            include "Model/Task.php";
            $data = array($title, $description, $assigned_to, $date);
            insertTask($conn, $data);

            $em = "Task Created successfully";
            header("Location: ../addTask.php?success=$em");
            exit();
        }
    }else {
        $em = "Unknown error occurred";
        header("Location: ../addTask.php?error=$em");
        exit();
    }

}else{
    header("Location: ../login.php");
    exit();
}

