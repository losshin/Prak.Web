<?php
require 'connectdb.php';

$id = $_GET["id"];


$result = mysqli_query($conn, "DELETE FROM warships WHERE id = $id");

if ($result) {
    echo "<script>alert('kehapus'); document.location.href = 'admin.php';</script>";
} else {
    echo "<script>alert('error'); document.location.href = 'tambah.php';</script>";
}

?>