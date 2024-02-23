<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Report </title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Navbar -->
    <div>
        <?php include('navbar.php'); ?>
    </div>
    <!-- Table -->
    <div class="container mt-5">
        <div class="form-container">
            <form method="post" action="">
                <div class="mb-3">
                    <label for="startDate" class="form-label">Start Date:</label>
                    <input type="date" class="form-control" id="startDate" name="startDate" required>
                </div>
                <div class="mb-3">
                    <label for="endDate" class="form-label">End Date:</label>
                    <input type="date" class="form-control" id="endDate" name="endDate" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Filter by Date Range</button>
                </div>
            </form>
        </div>

    </div>

    <div class="container mt-5">
        <table class="table table-striped">
            <tr class="table-primary">
                <th colspan="7" class="text-center"><h3>INVOICE REPORT</h3></th>
            </tr>
            <tr class="table-light">
                <th>Invoice No</th>
                <th>Date</th>
                <th>Customer Id</th>
                <th>Customer Name</th>
                <th>District</th>
                <th>Item Count</th>
                <th>Amount</th>
            </tr>

            <?php
            include('./backend/conn.php');
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];
                $sql = "SELECT * FROM invoice_report WHERE date BETWEEN '$startDate' AND '$endDate';";
                $res = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr class='table-light'> 
                        <td class='table-light'>" . $row['invoice_no'] . "</td>
                        <td class='table-light'>" . $row['date'] . "</td>
                        <td class='table-light'>" . $row['customer_id'] . "</td>
                        <td class='table-light'>" . $row['first_name'] . "</td>
                        <td class='table-light'>" . $row['district'] . "</td>
                        <td class='table-light'>" . $row['item_count'] . "</td>
                        <td class='table-light'>" . $row['amount'] . "</td>
                    </tr>";
                }
            } else {
                echo "<tr class='table-light'>
                <td colspan='7' class='text-center'>No records found. Please select date range</td>
            </tr>";
            }
            ?>



        </table>

    </div>


    <script>
        $(document).ready(function() {

        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>