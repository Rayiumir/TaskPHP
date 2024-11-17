<?php

function insertTask($conn, $data){
    $sql = "INSERT INTO tasks (title, description, assigned_to, date) VALUES(?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

function updateTask($conn, $data){
    $sql = "UPDATE tasks SET title=?, description=?, assigned_to=?, date=? WHERE id=? ";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

function get_task_by_id($conn, $id){
    $sql = "SELECT * FROM tasks WHERE id =? ";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if($stmt->rowCount() > 0){
        $task = $stmt->fetch();
    }else $task = 0;

    return $task;
}

function deleteTask($conn, $data){
    $sql = "DELETE FROM tasks WHERE id=? ";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

function all_tasks($conn){
    $sql = "SELECT * FROM tasks ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    if($stmt->rowCount() > 0){
        $tasks = $stmt->fetchAll();
    }else $tasks = 0;

    return $tasks;
}


function get_all_tasks_id($conn, $id){
    $sql = "SELECT * FROM tasks WHERE assigned_to=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if($stmt->rowCount() > 0){
        $tasks = $stmt->fetchAll();
    }else $tasks = 0;

    return $tasks;
}

function updateTaskStatus($conn, $data){
    $sql = "UPDATE tasks SET status=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

function countTasks($conn){
    $sql = "SELECT id FROM tasks";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    return $stmt->rowCount();
}

function all_tasks_today($conn){
    $sql = "SELECT * FROM tasks WHERE date = CURDATE() AND status != 'completed' ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    if($stmt->rowCount() > 0){
        $tasks = $stmt->fetchAll();
    }else $tasks = 0;

    return $tasks;
}

function count_tasks_today($conn){
    $sql = "SELECT id FROM tasks WHERE date = CURDATE() AND status != 'completed'";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    return $stmt->rowCount();
}

function all_tasks_over($conn){
    $sql = "SELECT * FROM tasks WHERE date < CURDATE() AND status != 'completed' ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    if($stmt->rowCount() > 0){
        $tasks = $stmt->fetchAll();
    }else $tasks = 0;

    return $tasks;
}
function countTasksOver($conn){
    $sql = "SELECT id FROM tasks WHERE date < CURDATE() AND status != 'completed'";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    return $stmt->rowCount();
}

function all_tasks_NoDeadline($conn){
    $sql = "SELECT * FROM tasks WHERE status != 'completed' AND date IS NULL OR date = '0000-00-00' ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    if($stmt->rowCount() > 0){
        $tasks = $stmt->fetchAll();
    }else $tasks = 0;

    return $tasks;
}
function countTasksNoDeadline($conn){
    $sql = "SELECT id FROM tasks WHERE status != 'completed' AND date IS NULL OR date = '0000-00-00'";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    return $stmt->rowCount();
}

function countMyTasks($conn, $id){
    $sql = "SELECT id FROM tasks WHERE assigned_to=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->rowCount();
}

function countMyTasksOverdue($conn, $id){
    $sql = "SELECT id FROM tasks WHERE date < CURDATE() AND status != 'completed' AND assigned_to=? AND date != '0000-00-00'";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->rowCount();
}
function countMyTasksNoDeadline($conn, $id){
    $sql = "SELECT id FROM tasks WHERE assigned_to=? AND status != 'completed' AND date IS NULL OR date = '0000-00-00'";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->rowCount();
}

function countMyPendingTasks($conn, $id){
    $sql = "SELECT id FROM tasks WHERE status = 'pending' AND assigned_to=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->rowCount();
}

function countMyInProgressTasks($conn, $id){
    $sql = "SELECT id FROM tasks WHERE status = 'in_progress' AND assigned_to=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->rowCount();
}

function countMyCompletedTasks($conn, $id){
    $sql = "SELECT id FROM tasks WHERE status = 'completed' AND assigned_to=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->rowCount();
}

function countPendingTasks($conn){
    $sql = "SELECT id FROM tasks WHERE status = 'pending'";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    return $stmt->rowCount();
}

function countInProgressTasks($conn){
    $sql = "SELECT id FROM tasks WHERE status = 'in_progress'";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    return $stmt->rowCount();
}

function countCompletedTasks($conn){
    $sql = "SELECT id FROM tasks WHERE status = 'completed'";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    return $stmt->rowCount();
}

function countTasksDuetoday($conn){
    $sql = "SELECT id FROM tasks WHERE date = CURDATE() AND status != 'completed'";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    return $stmt->rowCount();
}


