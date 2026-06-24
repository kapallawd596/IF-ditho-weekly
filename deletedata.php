<?php
require 'fungsi.php';

$id = (int)$_GET['id'];

if (deletedata($id) > 0) {
    echo "
    <script>
        alert('Data berhasil dihapus!');
        document.location.href='mahasiswa.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data gagal dihapus!');
        document.location.href='mahasiswa.php';
    </script>
    ";
}
?>