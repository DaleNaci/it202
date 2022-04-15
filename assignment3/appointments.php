<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Lushest Lawns And Landscaping</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div id="content">
            <a href="main.html"><button>Home</button></a>
            <?php
                $server_name = "sql1.njit.edu";
                $username = "dtn22";
                $password = "Lock_down44";
                $dbname = "dtn22";

                $conn = mysqli_connect($server_name, $username, $password, $dbname);

                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $sql = "SELECT * FROM Appointment";
                $result = $conn->query($sql);

                echo "<table>";
                echo "<tr>";
                echo "<th>Type</th>";
                echo "<th>Date</th>";
                echo "<th>Landscaper ID</th>";
                echo "<th>Client ID</th>";
                echo "<th>Service ID</th>";
                echo "</tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Type"] . "</td>";
                    echo "<td>" . $row["Date"] . "</td>";
                    echo "<td>" . $row["L_id"] . "</td>";
                    echo "<td>" . $row["C_id"] . "</td>";
                    echo "<td>" . $row["S_id"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";

                $conn->close();
            ?>
        </div>
    </body>
</html>
