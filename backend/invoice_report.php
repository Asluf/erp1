<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Report</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h3>Invoice Report</h3>
        <form action="" method="post">
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date">
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date">
            <input type="submit" value="Generate Report">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $start_date = $_POST["start_date"];
            $end_date = $_POST["end_date"];

            $servername = "localhost";
            $username = "username";
            $password = "password";
            $dbname = "your_database";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM invoices WHERE invoice_date BETWEEN '$start_date' AND '$end_date'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Invoice Number</th><th>Date</th><th>Customer</th><th>Customer District</th><th>Item Count</th><th>Invoice Amount</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    // You need to fetch customer details and item count/amount from related tables
                    echo "<tr><td>" . $row["invoice_number"] . "</td><td>" . $row["invoice_date"] . "</td><td>Customer</td><td>Customer District</td><td>Item Count</td><td>Invoice Amount</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }

            $conn->close();
        }
        ?>
    </div>
</body>
</html>
