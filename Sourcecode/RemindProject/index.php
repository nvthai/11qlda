<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>PHP CRUD Grid</h3>
            </div>
            <div class="row">
            <p>
                <a href="create.php" class="btn btn-success">Create</a>
            </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Title Id</th>
                      <th>Title Name</th>
                      
                    </	tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'connection.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM title';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['TitleId'] . '</td>';
                            echo '<td>'. $row['TitleName'] . '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>