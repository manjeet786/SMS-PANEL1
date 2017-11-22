
<?php
include_once('C:/wamp/www/SMS/connection/db.php');

$query = "SELECT * FROM invalid";
$results = mysqli_query($db,$query);


echo '<table border="1">';
echo '<tr>';
    echo "<th>Agent_id</th>";
    echo "<th>Mobile Number</th>";
    echo "<th>Action</th>";
echo '</tr>';

while($row=mysqli_fetch_array($results)){
    echo '<tr>';
    echo '<td>'.$row['Agent_id'].'</td>';
    echo '<td>'.$row['mobile'].'</td>';
    echo "<td>
      
        <a href='approve.php'> <input type='submit' value='Approve'></a>
             <a href='disapprove.php'><input type='submit' value='Disapprove'></a>
         </td>";
    echo '</tr>';
}
echo '</table>';



?>