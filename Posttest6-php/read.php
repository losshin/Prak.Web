<?php
    require 'admin.php';

    $train = [];

    while($row = mysqli_fetch_assoc($result)){
        $train[] = $row;
    }
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <div class="container d-flex align-items-center justify-content-between">
        <h1>Information</h1>
        <a style="height: 40px;" href="admin.php" role="button">Tambah</a>
    </div>
    <br>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Lokomotif</th>
                <th scope="col">Jenis</th>
                <th scope="col">Tahun Operasi</th>
                <th scope="col">CC</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($train as $trains) ;?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $trains["nama lokomotif"]; ?></td>
                <td><?php echo $trains["jenis"]; ?></td>
                <td><?php echo $trains["tahun beroperasi"]; ?></td>
                <td><?php echo $trains["cc"]; ?></td>
                <td>
                    <a class="btn btn-succes" href="" role="button"><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-danger" href="read.php" onclick="return confirm('yakin?');" role="button"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php $i++; endforeach ?>
        </tbody>
    </table>
</html>
