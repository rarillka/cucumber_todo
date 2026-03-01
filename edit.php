<?php
require 'db.php';

if (!(isset($_GET['id']))) {
    header('Location: index.php');
    exit;
}

$id = (int)$_GET['id'];


if (isset($_POST['task'])) {
    $newText = ($_POST['task']);
    
    if (!empty($newText)) {
        $sql = 'UPDATE `todos` SET `todoText` = ? WHERE `todoID` = ?';
        $query = $dbh->prepare($sql);
        $query->execute([$newText, $id]);
    }
    header('Location: index.php');
    exit;
}

    $sql = 'SELECT * FROM `todos` WHERE `todoID` = ?';
    $query = $dbh->prepare($sql);
    $query->execute([$id]);
    $task = $query->fetch(PDO::FETCH_ASSOC);


    if (!$task) {
        header('Location: index.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>
<body>
    <form method="POST">
        <input type="text" 
               name="task" 
               value="<?= htmlspecialchars($task['todoText']) ?>" 
               maxlength="150" 
               required >
        <div>
            <button type="submit">save</button>
            <a href="index.php"><button type="button" class="cancel">x</button></a>
        </div>
    </form>
</body>
</html>