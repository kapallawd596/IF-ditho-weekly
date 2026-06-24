<?php

require "fungsi.php";

$id = $_GET["id"];

$data = tampildata("SELECT * FROM mahasiswa WHERE id = $id")[0];

if(isset($_POST["submit"]))
{
    if(editdata($_POST) > 0)
    {
        echo "
        <script>
            alert('Data berhasil diubah!');
            document.location.href='mahasiswa.php';
        </script>
        ";
    }
    else
    {
        echo "
        <script>
            alert('Data gagal diubah!');
            document.location.href='mahasiswa.php';
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Edit Data Mahasiswa</h2>



<form action="" method="post" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <input type="hidden" name="fotoLama" value="<?= $data['foto']; ?>">

    <table border="1" cellpadding="5">

        <tr>
            <td>Nama</td>
            <td>
                <input
                    type="text"
                    name="nama"
                    value="<?= $data['nama']; ?>"
                    required>
            </td>
        </tr>

        <tr>
            <td>NIM</td>
            <td>
                <input
                    type="text"
                    name="nim"
                    value="<?= $data['nim']; ?>"
                    required>
            </td>
        </tr>

        <tr>
            <td>Jurusan</td>
            <td>
                <input
                    type="text"
                    name="jurusan"
                    value="<?= $data['jurusan']; ?>">
            </td>
        </tr>

        <tr>
            <td>Email</td>
            <td>
                <input
                    type="email"
                    name="email"
                    value="<?= $data['email']; ?>">
            </td>
        </tr>

        <tr>
            <td>No HP</td>
            <td>
                <input
                    type="text"
                    name="no_hp"
                    value="<?= $data['no_hp']; ?>">
            </td>
        </tr>

        <tr>
            <td>Foto Saat Ini</td>
            <td>
                <img
                    src="assets/images/<?= $data['foto']; ?>"
                    width="100">
            </td>
        </tr>

        <tr>
            <td>Ganti Foto</td>
            <td>
                <input type="file" name="foto">
            </td>
        </tr>

        <tr>
            <td colspan="2" align="center">
                <button type="submit" name="submit">
                    Simpan Perubahan
                </button>
            </td>
        </tr>

    </table>

</form>

</body>
</html>