<?php

if(isset($_POST['username']) && isset($_POST['password'])){

    include "../db.php";
    function validate_input($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    $username = validate_input($_POST['username']);
    $password = validate_input($_POST['password']);

    if(empty($username)){
        $em = "User name is required";
        header("Location: ../login.php?error=$em");
        exit();
    }elseif(empty($password)){
        $em = "Password is required";
        header("Location: ../login.php?error=$em");
        exit();
    }else{
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute($username);

        if ($stmt->rowCount() == 1){
            $row = $stmt->fetch();
            $idDB = $row['id'];
            $usernameDB = $row['username'];
            $passwordDB = $row['password'];
            $roleDB = $row['role'];

            if ($username === $usernameDB){
                if(password_verify($password, $passwordDB)){
                    if ($roleDB == "admin"){
                        $_SESSION['id'] = $idDB;
                        $_SESSION['username'] = $usernameDB;
                        $_SESSION['role'] = $roleDB;
                        header("Location: ../index.php");
                    }elseif($roleDB == "user"){
                        $_SESSION['id'] = $idDB;
                        $_SESSION['username'] = $usernameDB;
                        $_SESSION['role'] = $roleDB;
                        header("Location: ../index.php");
                    }else{
                        $em = "Unknown Error Occurred";
                        header("Location: ../login.php?error=$em");
                        exit();
                    }
                }else{
                    $em = "Incorrect Username or Password";
                    header("Location: ../login.php?error=$em");
                    exit();
                }
            }else{
                $em = "Incorrect Username or Password";
                header("Location: ../login.php?error=$em");
                exit();
            }
        }
    }

}else{
    $em = "Unknown Error Occurred";
    header("Location: ../login.php?error=$em");
    exit();
}
