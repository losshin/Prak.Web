<?php
require 'connectdb.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM warships WHERE id = $id");

$wrshp = [];

while ($row = mysqli_fetch_assoc($result)) {
    $wrshp[] = $row;
}

$wrshp = $wrshp[0];


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $thumbnail = $_POST['thumbnail'];
    $ships_name = $_POST['ships_name'];
    $equipment = $_POST['equipments'];
    $date = $_POST['date'];

    $sql = "UPDATE warships SET id = '$id', thumbnail = '$thumbnail', ships_name = '$ships_name'
            , equipments = '$equipment', date = '$date' WHERE id = $id";
    

    $result = mysqli_query($conn, $sql);


    if ($result) {
        echo "<script>alert('keupdate'); document.location.href = 'admin.php';</script>";
    } else {
        echo "<script>alert('error'); document.location.href = 'edit.php';</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update</title>
</head>
<body>
    <h2 style="text-align: center;">Update Warships</h2><br>
    <form action="" method="POST"></form>
    <div class="form-group" style="text-align: center;" display="flex;" >
        <div class="form-group">
            <label for="id">Id : </label>
            <input type="text" class="form-control" name="id" id="id" placeholder="Id" required>
        </div>
        <div class="form-group">
            <label for="thumbnail">Thumbnail : </label>
            <input type="file" class="form-control" name="thumbnail" id="thumbnail" placeholder="Thumbnail" value="<?php echo $wrshp['thumbnail'] ?>" required>
        </div>
        <div class="form-group">
            <label for="ships_name">Ships Name : </label>
            <input type="text" class="form-control" name="ships_name" id="ships_name" placeholder="Ships_name" value="<?php echo $wrshp['ships_name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="equipments">Equipment : </label>
            <input type="text" class="form-control" name="equipments" id="equipments" placeholder="Equipments" value="<?php echo $wrshp['equipments'] ?>" required>
        </div>
        <div class="form-group">
            <label for="date">Date: </label>
            <input type="date" class="form-control" name="date" id="date" placeholder="Date" value="<?php echo $wrshp['date'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary" style="width: 90%;"name="tambah" id></button>
    </div>
</body>
</html>