<?php include 'db_connect.php'; ?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding: 30px;
    }

    h2 {
        text-align: center;
        color: #333;
    }

    a {
        text-decoration: none;
        color: white;
        background-color: #007bff;
        padding: 8px 12px;
        border-radius: 4px;
        font-size: 14px;
        margin-left: 10px;
    }

    a:hover {
        background-color: #0056b3;
    }

    table {
        width: 100%;
        background-color: white;
        border-collapse: collapse;
        margin-top: 20px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    th, td {
        padding: 12px;
        border: 1px solid #ccc;
        text-align: center;
    }

    th {
        background-color: #007bff;
        color: white;
    }

td a {
    margin: 0 5px;
    color: white; 
    text-decoration: none;
}

td a:hover {
    text-decoration: underline;
}

</style>

<h2>Data Mahasiswa</h2>
<a href="tambah.php">+ Tambah Data</a><br><br>

<table>
    <tr>
        <th>Id Booking</th>
        <th>Nama Tamu</th>
        <th>Tipe Kamar</th>
        <th>Tanggal Check In</th>
        <th>Tanggal Check Out</th>
        <th>Status Pembayaran</th>
        <th>Aksi</th>
    </tr>

    <?php
    $result = mysqli_query($conn, "SELECT * FROM bookings");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>".$row['id_booking']."</td>
            <td>".$row['nama_tamu']."</td>
            <td>".$row['tipe_kamar']."</td>
            <td>".$row['tanggal_check_in']."</td>
            <td>".$row['tanggal_check_out']."</td>
            <td>".$row['status_pembayaran']."</td>
            <td>
                <a href='edit.php?id_booking=".$row['id_booking']."'>Edit</a> |
                <a href='hapus.php?id_booking=".$row['id_booking']."' onclick=\"return confirm('Yakin hapus?');\">Hapus</a>
            </td>
        </tr>";
    }
    ?>
</table>
