   <?php 
   require 'db.php';
   if((isset($_POST['task'])&& $_POST['task']!='')){
       $task = $_POST['task'];
        $sql = 'INSERT INTO todos(todoText) VALUES(:task)';

        $query = $dbh->prepare($sql);
    
        $query->execute(['task' => $task]);

        header('Location: index.php');
        exit;

    }
   else{
    	header('Location: index.php?status=notext');
        exit;
   }

  

   ?>