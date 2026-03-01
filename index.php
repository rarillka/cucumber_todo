<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cucumber todo app</title>
    <style>
        body{
            background-image: url('100050923758b0.jpg');
            background-size: cover;
        }
    </style>
</head>
<body>
   <?php 
   require 'db.php';
   ?>
   <div id="content">
    <form action="add.php" method="post">
        <input type="text" placeholder="enter your task text"  name="task" maxlength="150">
        <input type="submit" value="add task">
    </form>
    <?php 
            if (isset($_GET['status'])&& $_GET['status']=='notext'){
            echo "your task text is empty";};?>

    <ul>
        <?php foreach($result as $row): ?>
            <?php if($row['isComplete']==1):?>
            <li>
            <p><s><?= $row['todoText']?></s>    </p>
             <a href="changestatus.php?id=<?=$row['todoID']?>"><button>uncomplete</button></a>
             <a href="edit.php?id=<?=$row['todoID']?>"><button>edit</button></a>
             <a href="delete.php?id=<?=$row['todoID']?>"><button>x</button></a>
            </li>
            <?php else: ?>
            <li>
            <p><?= $row['todoText']?></p>
             <a href="changestatus.php?id=<?=$row['todoID']?>"><button>complete</button></a>
             <a href="edit.php?id=<?=$row['todoID']?>"><button>edit</button></a>
             <a href="delete.php?id=<?=$row['todoID']?>"><button>x</button></a>
            </li>
            <?php endif;?>

        <?php endforeach;

        ?>
        
    </ul>
   </div>
   <div class="footer">
    <p style="position: fixed; bottom: 0; width:100%; text-align: center">by Bragina Maria 2026</p>
   </div>
</body>
</html>
