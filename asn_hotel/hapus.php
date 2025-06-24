<?php include 'db_connect.php'; ?>

<?php
$ib = $_GET['id_booking'];
$query = "DELETE FROM bookings WHERE id_booking=$ib";

if (mysqli_query($conn, $query)) {
    header("Location: index.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>