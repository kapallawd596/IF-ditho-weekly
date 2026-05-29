<?php

$conn = mysqli_connect("localhost","root","","dithoweekly-a");

if(isset($_POST['submit'])){

    $nama     = $_POST['nama'];
    $nim      = $_POST['nim'];
    $jurusan  = $_POST['jurusan'];
    $email    = $_POST['email'];
    $no_hp    = $_POST['no_hp'];

    $foto = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmp, "assets/images/" . $foto);

    mysqli_query($conn,
    "INSERT INTO mahasiswa
    (nama,nim,jurusan,email,no_hp,foto)

    VALUES

    (
        '$nama',
        '$nim',
        '$jurusan',
        '$email',
        '$no_hp',
        '$foto'
    )");

    header("Location: mahasiswa.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="form-page">

<h2>Tambah Data Mahasiswa</h2>

<form action="" method="post" enctype="multipart/form-data">

    <table border="1" cellpadding="5">

        <tr>
            <td><label for="nama">Nama</label></td>
            <td>
                <input type="text" name="nama" id="nama" required>
            </td>
        </tr>

        <tr>
            <td><label for="nim">NIM</label></td>
            <td>
                <input type="number" name="nim" id="nim" required>
            </td>
        </tr>

        <tr>
            <td><label for="jurusan">Jurusan</label></td>
            <td>
                <input type="text" name="jurusan" id="jurusan">
            </td>
        </tr>

        <tr>
            <td><label for="email">Email</label></td>
            <td>
                <input type="email" name="email" id="email">
            </td>
        </tr>

        <tr>
            <td><label for="no_hp">No HP</label></td>
            <td>
                <input type="text" name="no_hp" id="no_hp">
            </td>
        </tr>

        <tr>
            <td><label for="foto">Foto</label></td>
            <td>
                <input type="file" name="foto" id="foto">
            </td>
        </tr>

        <tr>
            <td colspan="2" align="center">
                <button type="submit" name="submit">
                    Tambah Data
                </button>
            </td>
        </tr>

    </table>

</form>

</body>
</html>