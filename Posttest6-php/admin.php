


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Simpan Data</title>
    </head>
    <body>
        <div class="bldy">
            <center><h2> Simpan Data </h2>
            <table>
                <form action="admin.php" method="post">
                    <tr>
                        <td></td>
                        <td>
                            <input type="text" name="nonut" placeholder="no.unit" style="width:300px">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="text" name="nama_lokomotif" placeholder="nama lokomotif" style="width:300px">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="text" name="jenis" placeholder="jenis"  style="width:300px">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="number" name="tahun_beroperasi" placeholder="tahun beroperasi"  style="width:300px">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="float" name="cc" placeholder="cc" style="width:300px">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="Simpan">
                        </td>
                    </tr>
                </form>
            </table>
            </center>
        </div>
    </body>
</html>


<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "train_manufacture";

    $koneksi = mysqli_connect($host,$user,$pass,$db);
    if(!$koneksi){
        die("Tidak Terkoneksi Database");
    }


    if(isset($_POST['submit'])){
        $nonit = $_POST['nonut'];
        $nalok = $_POST['nama_lokomotif'];
        $jenis = $_POST['jenis'];
        $tahop = $_POST['tahun_beroperasi'];
        $cc = $_POST['cc'];
        $subm = "submit";
        
    }

    $sql = "INSERT INTO username VALUES ('$nonit', '$nalok', '$jenis', '$tahop', '$cc')";
    $result = mysqli_query($koneksi,$sql);

    if ($result) {
        echo "
        <script>
            document.location.href = 'read.php';
        </script>
        ";
    } else{
        echo "
        <script>
            document.location.href = 'admin.php'
        </script>
        ";
    }

   
?>
    




<!-- 
    // if(isset($_POST['ok'])){
    //     if(empty($_POST['no. unit']) || empty($_POST['NIM'])){
    //         print "Lengkapi form";
    //     }else{
    //         $user = $_POST['user'];
    //         $NIM = $_POST['NIM'];
    //         $tanggal = date("h:i:s");
    //         $buka = fopen("hasil.html");
    //         fwrite($buka,"user : ${user} <br> ");
    //         fwrite($buka,"dibuat : ${tanggal} <br> ");
    //         fwrite($buka," NIM : ${NIM} <br> ");
    //         fwrite($buka,"<hr>");
    //         fclose($buka);
    //         print "data berhasil disimpan";
    //     }
    // } -->
