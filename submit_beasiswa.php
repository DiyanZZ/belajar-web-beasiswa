<?php
// Pastikan koneksi ke database sesuai dengan konfigurasi Anda
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beasiswa_db";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Ambil data dari formulir
$nama = $_POST['nama'];
$email = $_POST['email'];
$noHp = $_POST['noHp'];
$semester = $_POST['semester'];
$ipk = $_POST['ipk'];
$beasiswa = isset($_POST['beasiswa']) ? $_POST['beasiswa'] : "Tidak Tersedia";

// Simpan data ke database
$sql = "INSERT INTO pendaftaran (nama, email, no_hp, semester, ipk, beasiswa)
        VALUES ('$nama', '$email', '$noHp', '$semester', '$ipk', '$beasiswa')";

if ($conn->query($sql)) {
    echo "<script>alert('Data berhasil disimpan ke database.'); window.location = 'index.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
