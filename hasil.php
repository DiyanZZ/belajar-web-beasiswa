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

// Query untuk mengambil data dari tabel pendaftaran
$sql = "SELECT * FROM pendaftaran";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftaran Beasiswa</title>
    <link rel="stylesheet" type="text/css" href="hasil.css">
</head>

<body>
    <h1>Data Pendaftaran Beasiswa</h1>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Nomor HP</th>
            <th>Semester Saat Ini</th>
            <th>IPK</th>
            <th>Pilihan Beasiswa</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["no_hp"] . "</td>";
                echo "<td>" . $row["semester"] . "</td>";
                echo "<td>" . $row["ipk"] . "</td>";
                echo "<td>" . $row["beasiswa"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Tidak ada data pendaftaran.</td></tr>";
        }
        ?>
    </table>
</body>

</html>

<?php
// Tutup koneksi
$conn->close();
?>