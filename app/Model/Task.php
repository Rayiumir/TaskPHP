<?php

function insertTask($conn, $data){
    $sql = "INSERT INTO tasks (title, description, assigned_to) VALUES(?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}