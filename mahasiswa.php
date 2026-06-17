<?php

require 'fungsi.php';

$qmahasiswa = "SELECT * FROM mahasiswa";
$mahasiswas = tampildata($qmahasiswa);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>WEB INFORMATIKA</h1>

<hr>

<table border="1" cellspacing="0" cellpadding="10">
    <tr>
        <td><a href="index.php">Home</a></td>
        <td><a href="profile.php">Profile</a></td>
        <td><a href="contact.php">Contact</a></td>
        <td><a href="mahasiswa.php">Data Mahasiswa</a></td>
    </tr>
</table>

<br>

<h2>Data Mahasiswa</h2>

<a href="inputdata.php">
    <button>Tambah Data</button>
</a>

<br><br>

<table border="1" cellspacing="0" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Jurusan</th>
        <th>Email</th>
        <th>No HP</th>
        <th>Foto</th>
        <th>Aksi</th>
    </tr>

    <?php
    $i = 1;
    foreach ($mahasiswas as $mhs) :
    ?>

    <tr>
        <td align="center"><?= $i++; ?></td>

        <td><?= $mhs["nama"]; ?></td>

        <td align="center"><?= $mhs["nim"]; ?></td>

        <td align="center"><?= $mhs["jurusan"]; ?></td>

        <td align="center"><?= $mhs["email"]; ?></td>

        <td align="center"><?= $mhs["no_hp"]; ?></td>

        <td align="center">
            <img
                src="assets/images/<?= $mhs["foto"]; ?>"
                alt="Foto Mahasiswa"
                width="70px"
            >
        </td>

        <td align="center">
            <a href="editdata.php?id=<?= $mhs["id"]; ?>">
                <button>EDIT</button>
            </a>

            |

            <a href="hapusdata.php?id=<?= $mhs["id"]; ?>"
               onclick="return confirm('Yakin ingin menghapus data?')">
                <button>HAPUS</button>
            </a>
        </td>
    </tr>

    <?php endforeach; ?>

</table>

</body>
</html>