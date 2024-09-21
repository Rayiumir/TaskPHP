<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {

    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']) && $_SESSION['role'] == 'admin') {
        require_once "db.php";

        function validate_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }

        $user_name = validate_input($_POST['username']);
        $password = validate_input($_POST['password']);
        $name = validate_input($_POST['name']);
        $id = validate_input($_POST['id']);


        if (empty($user_name)) {
            $em = "Username is required";
            header("Location: ../editUser.php?error=$em&id=$id");
            exit();
        }else if (empty($password)) {
            $em = "Password is required";
            header("Location: ../editUser.php?error=$em&id=$id");
            exit();
        }else if (empty($name)) {
            $em = "Full name is required";
            header("Location: ../editUser.php?error=$em&id=$id");
            exit();
        }else {

            require_once "Model/User.php";
            $password = password_hash($password, PASSWORD_DEFAULT);

            $data = array($name, $user_name, $password, "user", $id, "user");
            updateUser($conn, $data);

            $em = "User Updated successfully";
            header("Location: ../editUser.php?success=$em&id=$id");
            exit();


        }
    }else {
        $em = "Unknown error occurred";
        header("Location: ../editUser.php?error=$em");
        exit();
    }

}else{
    header("Location: ../editUser.php");
    exit();
}
