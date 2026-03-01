    <?php     try{
            $dsn = 'mysql:dbname=todolist;host=127.0.0.2;port=3307';
            $user = 'root';
            $password = '';
            
            $dbh = new PDO($dsn, $user, $password);
            // echo 'Connected <br>';
            $sql = 'SELECT * from todos order by todoID';
            $result = $dbh->query($sql);
    }
        
        catch(PDOException $e){
            echo "Something went wrong, ".$e->getMessage();
        };

        


        ?>