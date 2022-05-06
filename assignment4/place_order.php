<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Lushest Lawns And Landscaping</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div id="content">
            <h1>Order Form</h1>
            <form action="" method="post">
                <label for="fname">Customer's First Name</label><br>
                <input type="text" id="fname" name="fname">
                <label>REQUIRED</label><br><br>

                <label for="fname">Customer's Last Name</label><br>
                <input type="text" id="lname" name="lname">
                <label>REQUIRED</label><br><br>

                <label for="idnum">Customer's ID Number</label><br>
                <input type="number" id="idnum" name="idnum">
                <label>REQUIRED</label><br><br>

                <label for="address">Customer's Service ID</label><br>
                <input type="text" id="serviceid" name="serviceid">
                <label>REQUIRED</label><br><br>

                <label for="servicetype">Products Needed</label><br>
                <input type="text" id="products" name="products">
                <label>REQUIRED</label><br><br>

                <input type="submit" value="Submit" id="submit"><br>
            </form>

            <?php
                $server_name = "sql1.njit.edu";
                $username = "dtn22";
                $password = "Lock_down44";
                $dbname = "dtn22";

                $conn = mysqli_connect($server_name, $username, $password, $dbname);

                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $sql = "SELECT * FROM Client";
                $result = $conn->query($sql);

                if (isset($_POST["fname"])) {
                    $is_client = False;

                    while ($row = $result->fetch_assoc()) {
                        if ($row["Fname"] == $_POST["fname"]
                            && $row["Lname"] == $_POST["lname"]
                            && $row["Id"] == $_POST["idnum"]) {
                            $is_client = True;
                        }
                    }

                    if ($is_client) {
                        $appt_sql = "SELECT * FROM Appointment";
                        $appt_res = $conn->query($appt_sql);

                        $appt_booked = False;

                        while ($row = $appt_res->fetch_assoc()) {
                            if ($row["S_id"] == $_POST["serviceid"] && $row["C_id"] == $_POST["idnum"]) {
                                $appt_booked = True;
                            }
                        }

                        if ($appt_booked) {
                            $order_sql = "INSERT INTO Orders VALUES "
                                         . "("
                                         . "\""
                                         . $_POST["products"]
                                         . "\""
                                         . ", "
                                         . "\"TEMP ADDRESS\""
                                         . ", "
                                         . rand(40000000, 49999999)
                                         . ", "
                                         . 10000003
                                         . ", "
                                         . $_POST["idnum"]
                                         . ", "
                                         . $_POST["serviceid"]
                                         . ");";

                            $conn->query($order_sql);

                            echo "<script>alert('Order Placed.')</script>";
                        } else {
                            echo "<script>alert('CLIENT DOES NOT HAVE AN APPOINTMENT.')</script>";
                        }
                    } else {
                        echo "<script>alert('CLIENT CANNOT BE FOUND.')</script>";
                    }
                }

                $conn->close();
            ?>
        </div>
    </body>
</html>
