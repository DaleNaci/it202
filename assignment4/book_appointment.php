<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Lushest Lawns And Landscaping</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div id="content">
            <h1>Book An Appointment</h1>
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

                <label for="address">Customer's Address</label><br>
                <input type="text" id="address" name="address">
                <label>REQUIRED</label><br><br>

                <label for="servicetype">Type of Service</label><br>
                <input type="text" id="servicetype" name="servicetype">
                <label>REQUIRED</label><br><br>

                <label for="date">Date of Service</label><br>
                <input type="text" id="date" name="date">
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
                        $appt_sql = "INSERT INTO Appointment VALUES "
                                     . "("
                                     . "\""
                                     . $_POST["servicetype"]
                                     . "\""
                                     . ", "
                                     . "\""
                                     . $_POST["date"]
                                     . "\""
                                     . ", "
                                     . 10000003
                                     . ", "
                                     . $_POST["idnum"]
                                     . ", "
                                     . rand(30000000, 39999999)
                                     . ");";

                        $conn->query($appt_sql);

                        echo "<script>alert('Appointment Placed.')</script>";
                    } else {
                        echo "<script>alert('CLIENT CANNOT BE FOUND.')</script>";
                    }
                }

                $conn->close();
            ?>
        </div>
    </body>
</html>
