<?php

$conn = mysqli_connect("localhost","root","","dithoweekly-a");

$id = $_GET['id'];

mysqli_query($conn,
"DELETE FROM mahasiswa WHERE id = $id");

header("Location: mahasiswa.php");
exit;

?>