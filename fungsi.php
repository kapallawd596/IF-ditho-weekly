<?php

$koneksi = mysqli_connect("localhost", "root", "", "dithoweekly-A");

function tampildata($query)
{
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    $rows = [];

    while($row = mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }

    return $rows;
}

function inputdata($data)
{
    global $koneksi;

    $nama    = htmlspecialchars($data["nama"]);
    $nim     = htmlspecialchars($data["nim"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $email   = htmlspecialchars($data["email"]);
    $no_hp   = htmlspecialchars($data["no_hp"]);

    $foto = "";

    if($_FILES["foto"]["error"] == 0)
    {
        $foto = time() . "_" . $_FILES["foto"]["name"];

        move_uploaded_file(
            $_FILES["foto"]["tmp_name"],
            "assets/images/" . $foto
        );
    }

    $query = "INSERT INTO mahasiswa
    (nama, nim, jurusan, email, no_hp, foto)
    VALUES
    (
        '$nama',
        '$nim',
        '$jurusan',
        '$email',
        '$no_hp',
        '$foto'
    )";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function deletedata($id)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($koneksi);
}

function editdata($data)
{
    global $koneksi;

    $id      = $data["id"];
    $nama    = htmlspecialchars($data["nama"]);
    $nim     = htmlspecialchars($data["nim"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $email   = htmlspecialchars($data["email"]);
    $no_hp   = htmlspecialchars($data["no_hp"]);
    $fotoLama = $data["fotoLama"];

    $foto = $fotoLama;

    if($_FILES["foto"]["error"] == 0)
    {
        $foto = time() . "_" . $_FILES["foto"]["name"];

        move_uploaded_file(
            $_FILES["foto"]["tmp_name"],
            "assets/images/" . $foto
        );
    }

    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                nim = '$nim',
                jurusan = '$jurusan',
                email = '$email',
                no_hp = '$no_hp',
                foto = '$foto'
              WHERE id = $id";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

?>