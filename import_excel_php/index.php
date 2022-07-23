<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="import.php" enctype="multipart/form-data">
    <input type="file" name="excel_file" accept=".csv">
    <input type="submit" name="import" value="Import">
    </form>
    <table>
    <tr>
    <th>roll no</th>
    <th>name</th>
    <th>email</th>
    <th>mobile</th>
    </tr>

    <?php
    $db = mysqli_connect('localhost','root','','myproject');
    $query="SELECT * FROM students";
    $row = mysqli_query($db,$query);

    while($data = mysqli_fetch_array($row)){
        ?>
<tr>
<td><?=$data['roll_no']?></td>
<td><?=$data['name']?></td>
<td><?=$data['email']?></td>
<td><?=$data['mobile']?></td>

</tr>
        <?php
    }



    ?>
    </table>
</body>
</html>