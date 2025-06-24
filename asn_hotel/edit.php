<?php include 'db_connect.php'; ?>

<?php
$ib = $_GET['id_booking'];
$data = mysqli_query($conn, "SELECT * FROM bookings WHERE id_booking=$ib");
$row = mysqli_fetch_assoc($data);
?>

<!-- Styling -->
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f2f5;
        padding: 20px;
    }

    .form-container {
        background-color: #fff;
        max-width: 400px;
        margin: auto;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
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
        background-color: #ffc107;
        color: black;
        padding: 10px;
        width: 100%;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }

    button:hover {
        background-color: #e0a800;
    }

    .message {
        text-align: center;
        margin-top: 20px;
        font-weight: bold;
    }

    a {
        color: #007bff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

<!-- Form Edit -->
<div class="form-container">
    <h2>Edit Data Booking</h2>
    <form method="POST" action="">
        Nama tamu: <input type="text" name="nama_tamu" value="<?php echo $row['nama_tamu']; ?>" required><br>
        Tipe kamar: <input type="text" name="tipe_kamar" value="<?php echo $row['tipe_kamar']; ?>" required><br>
        Tanggal Check In: <input type="date" name="tanggal_check_in" value="<?php echo $row['tanggal_check_in']; ?>" required><br>
        Tanggal Check Out: <input type="date" name="tanggal_check_out" value="<?php echo $row['tanggal_check_out']; ?>" required><br>
        Status pembayaran: <input type="text" name="status_pembayaran" value="<?php echo $row['status_pembayaran']; ?>" required><br>
        <button type="submit" name="update">Update</button>
    </form>
</div>

<?php
if (isset($_POST['update'])) {

    $nt = $_POST['nama_tamu'];
    $tk = $_POST['tipe_kamar'];
    $ci = $_POST['tanggal_check_in'];
    $co = $_POST['tanggal_check_out'];
    $sp = $_POST['status_pembayaran'];

    $query = "UPDATE bookings 
                SET nama_tamu='$nt', 
                    tipe_kamar='$tk', 
                    tanggal_check_in='$ci', 
                    tanggal_check_out='$co', 
                    status_pembayaran='$sp'
                WHERE id_booking=$ib";
    if (mysqli_query($conn, $query)) {
        echo "<div class='message' style='color: green;'>Data berhasil diupdate! <a href='index.php'>Kembali</a></div>";
    } else {
        echo "<div class='message' style='color: red;'>Error: " . $query . "<br>" . mysqli_error($conn) . "</div>";
    }
}
?>
