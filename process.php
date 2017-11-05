<html><body>
<?php

$sql = "SELECT PAV, genre_id, DEV FROM z_pard";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Pavadinimas: " . $row["PAV"]. " - DEVELOPER: " . $row["DEV"]. " " . $row["genre_id"]. "<br>";
    }
} else {
    echo "0 results";
}
$con->close();
?>

</body></html>