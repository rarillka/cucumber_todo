<?php 

require 'db.php';


if((isset($_GET['id']))){
  $id = $_GET['id'];
}
else{
    header('Location: index.php');
    exit;
}

    $sql0 = 'SELECT `isComplete` FROM `todos` WHERE `todoID` = ?';
    $query = $dbh->prepare($sql0);
    $query->execute([$id]);
    $task = $query->fetch(PDO::FETCH_ASSOC);

    $sql = 'UPDATE `todos` SET `isComplete` = 1 - `isComplete` WHERE `todoID` = ?';
    $query = $dbh->prepare($sql);
    $query->execute([$id]);


  header('Location: index.php');
  exit;

 ?>
