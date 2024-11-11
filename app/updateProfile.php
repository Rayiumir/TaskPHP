<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {

    if (isset($_POST['password']) && isset($_POST['name']) && $_SESSION['role'] == 'user') {
        include "../db.php";

        function validate_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }


        $password = validate_input($_POST['password']);
        $name = validate_input($_POST['name']);
        $id = $_SESSION['id'];

        if (empty($password) ) {
            $em = "Password is required";
            header("Location: ../editProfiles.php?error=$em");
            exit();
        }else if (empty($name)) {
            $em = "Full Name is required";
            header("Location: ../editProfiles.php?error=$em");
            exit();
        } else {

            include "Model/User.php";

            $user = get_user_by_id($conn, $id);
            if ($user) {
                if (password_verify($password, $user['password'])) {

                    $password = password_hash($password, PASSWORD_DEFAULT);



                    $data = array($name, $password, $id);
                    updateProfile($conn, $data);

                    $em = "User Updated successfully";
                    header("Location: ../profiles.php?success=$em");
                    exit();
                }else {
                    $em = "Incorrect password";
                    header("Location: ../editProfiles.php?error=$em");
                    exit();
                }
            }else {
                $em = "Unknown error occurred";
                header("Location: ../edit_profile.php?error=$em");
                exit();
            }
        }
    }else {
        $em = "Unknown error occurred";
        header("Location: ../editProfiles.php?error=$em");
        exit();
    }

}else{
    $em = "First login";
    header("Location: ../login.php?error=$em");
    exit();
}