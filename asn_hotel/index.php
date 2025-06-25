<?php include 'db_connect.php'; ?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-image: url('https://wallpaperaccess.com/full/2690589.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        margin: 0;
        height: 100vh;

        display: flex;
        justify-content: center;
        align-items: center;
    }

    .wrapper {
        background-color: rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(8px);
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        width: 95%;
        max-width: 1000px;
    }

    h2 {
        text-align: center;
        color: #fff;
        text-shadow: 1px 1px 3px #000;
        margin-bottom: 20px;
    }

    a {
        text-decoration: none;
        color: white;
        background-color: #007bff;
        padding: 8px 12px;
        border-radius: 4px;
        font-size: 14px;
        margin-bottom: 15px;
        display: inline-block;
    }

    a:hover {
        background-color: #0056b3;
    }

    table {
        width: 100%;
        background-color: rgba(255, 255, 255, 0.9);
        border-collapse: collapse;
        margin-top: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    th, td {
        padding: 12px;
        border: 1px solid #ccc;
        text-align: center;
    }

    th {
        background-color: rgb(0, 0, 0);
        color: white;
    }

    td a {
        margin: 0 5px;
        color: white;
        text-decoration: none;
        background-color: #17a2b8;
        padding: 5px 10px;
        border-radius: 3px;
    }

    td a:hover {
        background-color: #117a8b;
    }
</style>

<div class="wrapper">
    <h2>Data Tamu Hotel</h2>
    <a href="tambah.php">+ Tambah Data</a>

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
                    <a href='edit.php?id_booking=".$row['id_booking']."'>Edit</a>
                    <a href='hapus.php?id_booking=".$row['id_booking']."' onclick=\"return confirm('Yakin hapus?');\">Hapus</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</div>
