<?php 

require 'db.php';


if((isset($_GET['id']))){
  $id = $_GET['id'];
}
else{
    header('Location: index.php');
    exit;
}

  $sql = 'DELETE FROM `todos` WHERE `todoID` = ?';
  $query = $dbh->prepare($sql);
  $query->execute([$id]);

  header('Location: index.php');
  exit;

 ?>
