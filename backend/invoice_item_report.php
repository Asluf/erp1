<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Item Report</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h3>Invoice Item Report</h3>
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

            $sql = "SELECT * FROM invoice_items WHERE invoice_id IN (SELECT id FROM invoices WHERE invoice_date BETWEEN '$start_date' AND '$end_date')";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Invoice Number</th><th>Invoiced Date</th><th>Customer Name</th><th>Item Name</th><th>Item Code</th><th>Item Category</th><th>Item Unit Price</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    // You need to fetch customer name and item details from related tables
                    echo "<tr><td>Invoice Number</td><td>Invoiced Date</td><td>Customer Name</td><td>Item Name</td><td>Item Code</td><td>Item Category</td><td>Item Unit Price</td></tr>";
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
