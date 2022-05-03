<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Lushest Lawns And Landscaping</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div id="content">
            <?php
                $server_name = "sql1.njit.edu";
                $username = "dtn22";
                $password = "Lock_down44";
                $dbname = "dtn22";

                $conn = mysqli_connect($server_name, $username, $password, $dbname);

                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $sql = "
                SELECT	Landscaper.Fname as land_fn,
                        Landscaper.Lname as land_ln,
                       	Landscaper.Idnum,
                       	Landscaper.Pnum,
                       	Landscaper.Eaddress,
                       	Client.Fname as client_fn,
                       	Client.Lname as client_ln,
                       	Client.Id,
                       	Orders.Address,
                       	Appointment.Type as appt_type,
                       	Appointment.Date,
                       	Appointment.S_id,
                       	Orders.Type as order_type,
                       	Orders.OrderNum
                FROM 	Landscaper
                		INNER JOIN Appointment
                        	ON Landscaper.Idnum = Appointment.L_id
                        INNER JOIN Orders
                        	ON Landscaper.Idnum = Orders.L_id
                        INNER JOIN Client
                        	ON Orders.C_id = Client.Id
                WHERE   Landscaper.Idnum=10000003;
                ";

                $result = $conn->query($sql);

                echo "<table>";
                echo "<tr>";
                echo "<th>Landscaper FN</th>";
                echo "<th>Landscaper LN</th>";
                echo "<th>Landscaper ID</th>";
                echo "<th>Landscaper Phone #</th>";
                echo "<th>Landscaper Email</th>";
                echo "<th>Client FN</th>";
                echo "<th>Client LN</th>";
                echo "<th>Client ID</th>";
                echo "<th>Client Address</th>";
                echo "<th>Appointment Type</th>";
                echo "<th>Appointment Date</th>";
                echo "<th>Service ID</th>";
                echo "<th>Product Needed</th>";
                echo "<th>Order Num</th>";
                echo "</tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["land_fn"] . "</td>";
                    echo "<td>" . $row["land_ln"] . "</td>";
                    echo "<td>" . $row["Idnum"] . "</td>";
                    echo "<td>" . $row["Pnum"] . "</td>";
                    echo "<td>" . $row["Eaddress"] . "</td>";
                    echo "<td>" . $row["client_fn"] . "</td>";
                    echo "<td>" . $row["client_ln"] . "</td>";
                    echo "<td>" . $row["Id"] . "</td>";
                    echo "<td>" . $row["Address"] . "</td>";
                    echo "<td>" . $row["appt_type"] . "</td>";
                    echo "<td>" . $row["Date"] . "</td>";
                    echo "<td>" . $row["S_id"] . "</td>";
                    echo "<td>" . $row["order_type"] . "</td>";
                    echo "<td>" . $row["OrderNum"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";

                $conn->close();
            ?>
        </div>
    </body>
</html>
