<?php
include 'db_connection.php';
$conn = OpenCon();
    if(isset($_POST["name"]) && isset($_POST["password"])) {
        $sql = "SELECT name, secret FROM users WHERE ispublic = 1 AND name = '".$_POST["name"]."' AND password = '".$_POST["password"]."'";
        $result = mysqli_query($conn, $sql);
        if($result === false) {
            echo "User does not exist or password does not match.";
        } else {
            echo "<table>";

            while($row = mysql_fetch_array($result)) {
                echo <<<EOM
                <tr>
                     <td>$row[0]</td>
                     <td>$row[1]</td>
                     <td>$row[3]</td>
                </tr>
             EOM;
            }
            
            echo "</table>";
        }
    }

CloseCon($conn);
?>