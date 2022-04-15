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

                $sql = "SELECT * FROM Landscaper";
                $result = $conn->query($sql);

                echo "<table>";
                echo "<tr>";
                echo "<th>First Name</th>";
                echo "<th>Last Name</th>";
                echo "<th>Password</th>";
                echo "<th>ID #</th>";
                echo "<th>Phone #</th>";
                echo "<th>Email Address</th>";
                echo "</tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Fname"] . "</td>";
                    echo "<td>" . $row["Lname"] . "</td>";
                    echo "<td>" . $row["password"] . "</td>";
                    echo "<td>" . $row["Idnum"] . "</td>";
                    echo "<td>" . $row["Pnum"] . "</td>";
                    echo "<td>" . $row["Eaddress"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";

                $conn->close();
            ?>
        </div>
    </body>
</html>
