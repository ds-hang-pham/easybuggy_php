<?php
include 'db_connection.php';
$conn = OpenCon();
    if(isset($_POST["name"]) && isset($_POST["password"])) {
        $sql = "SELECT name, secret FROM users WHERE ispublic = 1 AND name = '".$_POST["name"]."' AND password = '".$_POST["password"]."'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)==0) {
            echo "User does not exist or password does not match.";
        } else {
            echo "<table>";

            while($row = mysqli_fetch_array($result)) {
                echo "
                <tr>
                     <td>$row[0]</td>
                     <td>$row[1]</td>
                </tr>";
            }
            
            echo "</table>";
        }
    }

CloseCon($conn);
?>