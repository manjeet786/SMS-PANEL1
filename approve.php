<?php
include_once('C:/wamp/www/SMS/connection/db.php');

$sql = "SELECT  Agent_id,mobile,status FROM invalid";
$result = mysqli_query($db,$sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["Agent_id"]. " - mobile: " . $row["mobile"]. " " . $row["status"]. "<br>";
    }
} else {
    echo "0 results";
}

?>