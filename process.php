<html><body>
<?php

$sql = "SELECT PAV, GENRE, DEV FROM z_pard";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Pavadinimas: " . $row["PAV"]. " - DEVELOPER: " . $row["DEV"]. " " . $row["GENRE"]. "<br>";
    }
} else {
    echo "0 results";
}
$con->close();
?>

</body></html>