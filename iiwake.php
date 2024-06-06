[root@server ~]# cat /var/www/html/shop.php
<?php
  $res = "";
  $pdo = new PDO('mysql:host=127.0.0.1;dbname=testdb', 'root', 'admin');
  $sql = "select * from iiwake_naiyou where month=?";
  $stmt = $pdo->prepare($sql);
  $array = array($_GET{'month'});
  $stmt->execute($array);

  $res = "<table>\n";
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $res .= "<tr><td>" .$row['id'] .
            "</td><td>" .$row['ivent_name'].
            "</td><td>" .$row['vent_place'].
            "</td><td>" .$row['month'].
            "</td><td>" .$row['day'].
            "</td></tr>\n";
  }
  $res .= "</table>\n"
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>
  <?php echo $res; ?>
</body>
</html>
