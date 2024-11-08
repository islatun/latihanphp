<?php
require_once '../koneksi/koneksi.php';

$nama_depan = $_POST['ndepan'];
$nama_belakang = $_POST['nbelakang'];
$email = $_POST['mail'];
$password = $_POST['pwd'];
$photo_name = $_FILES['filePhoto']['name'];
$photo_tmp = $_FILES['filePhoto']['tmp_name'];

if (!empty($_POST['id'])) {
    // kalau id tidak kosong, update
} else {
    // kalau kosong, insert
}    
if (!empty($_POST['id'])) {
    // kalau id tidak kosong, update
    try {
        move_uploaded_file($photo_tmp, '../photo/' . $photo_name);
        $sql = 'UPDATE data_pendaftar SET nama_depan = ?, nama_belakang = ?, email = ?, password = ?, photo = ? WHERE id = ?';
        $qonnect = $database_connection->prepare($sql);
        $qonnect->execute([$nama_depan, $nama_belakang, $email, sha1($password), 'photo/' . $photo_name, $_POST['id']]);

        echo "Data updated successfully!";
    } catch (PDOException $err) {
        die("Error updating data: " . $err->getMessage());
    }
} else {
    // kalau kosong, insert
}
