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

        /* Ini penting untuk center */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form-container {
        background-color: rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(8px);
        width: 100%;
        max-width: 400px;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.3);
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #222;
        text-shadow: 1px 1px 2px #fff;
    }

    input[type="text"],
    input[type="date"] {
        width: 100%;
        padding: 10px;
        margin-top: 8px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    button {
        background-color: #28a745;
        color: white;
        padding: 10px;
        width: 100%;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }

    button:hover {
        background-color: #218838;
    }

    .message {
        text-align: center;
        margin-top: 20px;
        font-weight: bold;
    }
</style>

<div class="form-container">
    <h2>Tambah Data Booking</h2>

    <form method="POST" action="">
        Id booking: <input type="text" name="Id_Booking" required><br>
        Nama tamu: <input type="text" name="Nama_tamu" required><br>
        Tipe kamar: <input type="text" name="Tipe_kamar" required><br>
        Tanggal Check In: <input type="date" name="Tanggal_check_in" required><br>
        Tanggal Check Out: <input type="date" name="Tanggal_check_out" required><br>
        Status pembayaran: <input type="text" name="Status_pembayaran" required><br>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</div>

<?php
if (isset($_POST['simpan'])) {
    $nt = $_POST['Nama_tamu'];
    $tk = $_POST['Tipe_kamar'];
    $ci = $_POST['Tanggal_check_in'];
    $co = $_POST['Tanggal_check_out'];  
    $sp = $_POST['Status_pembayaran'];

    $query = "INSERT INTO bookings (Nama_tamu, Tipe_kamar, Tanggal_check_in, Tanggal_check_out, Status_pembayaran) 
              VALUES ('$nt', '$tk', '$ci', '$co', '$sp')";
    
    if (mysqli_query($conn, $query)) {
        echo "<div class='message' style='color: green;'>Data berhasil ditambahkan!</div>";
    } else {
        echo "<div class='message' style='color: red;'>Error: " . $query . "<br>" . mysqli_error($conn) . "</div>";
    }
}
?>
