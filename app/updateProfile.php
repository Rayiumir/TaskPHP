<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {

    if (isset($_POST['confirmPassword']) && isset($_POST['newPassword']) && isset($_POST['password']) && isset($_POST['name']) && $_SESSION['role'] == 'user') {
        include "../db.php";

        function validate_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }


        $password = validate_input($_POST['password']);
        $name = validate_input($_POST['name']);
        $newPassword = validate_input($_POST['newPassword']);
        $confirmPassword = validate_input($_POST['confirmPassword']);
        $id = $_SESSION['id'];

        if (empty($password) || empty($newPassword) || empty($confirmPassword) ) {
            $em = "Password is required";
            header("Location: ../editProfiles.php?error=$em");
            exit();
        }else if (empty($full_name)) {
            $em = "Full Name is required";
            header("Location: ../editProfiles.php?error=$em");
            exit();
        }else if ($confirmPassword != $newPassword) {
            $em = "New Password and confirm password do not match";
            header("Location: ../editProfiles.php?error=$em");
            exit();
        }else {

            include "Model/User.php";

            $user = get_user_by_id($conn, $id);
            if ($user) {
                if (password_verify($password, $user['password'])) {

                    $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    $data = array($name, $newPassword, $id);
                    updateProfile($conn, $data);

                    $em = "User created successfully";
                    header("Location: ../profiles.php?success=$em");
                    exit();
                }else {
                    $em = "Incorrect password";
                    header("Location: ../profiles.php?error=$em");
                    exit();
                }
            }else {
                $em = "Unknown error occurred";
                header("Location: ../profiles.php?error=$em");
                exit();
            }


        }
    }else {
        $em = "Unknown error occurred";
        header("Location: ../profiles.php?error=$em");
        exit();
    }

}else{
    $em = "First login";
    header("Location: ../login.php?error=$em");
    exit();
}