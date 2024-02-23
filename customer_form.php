<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Customer</title>
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
        <table class="table table-striped">
            <tr class="table-primary">
                <th colspan="7" class="text-center"><h3>CUSTOMER DETAILS</h3></th>
            </tr>
            <tr class="table-light">
                <th>Customer ID</th>
                <th>Title</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Contact Number</th>
                <th>District</th>
            </tr>

            <?php
            include('./backend/conn.php');
            $sql = "SELECT * FROM customer";
            $res = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr class='table-light'> 
                        <td class='table-light'>" . $row['id'] . "</td>
                        <td class='table-light'>" . $row['title'] . "</td>
                        <td class='table-light'>" . $row['first_name'] . "</td>
                        <td class='table-light'>" . $row['middle_name'] . "</td>
                        <td class='table-light'>" . $row['last_name'] . "</td>
                        <td class='table-light'>" . $row['contact_no'] . "</td>
                        <td class='table-light'>" . $row['district'] . "</td>
                    
                    </tr>";
            }
            ?>



        </table>
    </div>
    <div class="text-center">
        <button type="button" class="btn btn-primary" id="addCustomerBtn">Add New Customer</button>
    </div>

    <!-- Form -->
    <div class="form-container" style="display: none;">
        <h3 class="text-center">Customer Registration Form</h3>
        <form id="customer-form">
            <label for="title">Title:</label>
            <select name="title" id="title">
                <option value="Select">Select</option>
                <option value="Mr">Mr</option>
                <option value="Mrs">Mrs</option>
                <option value="Miss">Miss</option>
                <option value="Dr">Dr</option>
            </select><br><br>
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name"><br><br>
            <label for="middle_name">Middle Name:</label>
            <input type="text" id="middle_name" name="middle_name"><br><br>
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name"><br><br>
            <label for="contact_number">Contact Number:</label>
            <input type="text" id="contact_number" name="contact_number"><br><br>
            <label for="district">District:</label>
            <select name="district" id="district">
                <option value="Select">Select</option>
                <?php
                $sql = "SELECT * FROM district";
                $res = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<option value=" . $row['id'] . ">" . $row['district'] . "</option>";
                }
                ?>

            </select><br><br>
            <div class="text-center">
                <input type="submit" id="btn-submit" value="Register">
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $("#addCustomerBtn").click(function() {
                $(".form-container").toggle();
            });
            $("#customer-form").submit(function(e) {
                e.preventDefault();

                var title = $("#title").val();
                var firstName = $("#first_name").val();
                var middleName = $("#middle_name").val();
                var lastName = $("#last_name").val();
                var contactNumber = $("#contact_number").val();
                var district = $("#district").val();

                if (!title || title === "Select" || !firstName || !lastName || !contactNumber || district === "Select") {
                    Swal.fire("Please fill in all fields.");
                    return;
                }

                // Create data object
                var data = {
                    title: title,
                    first_name: firstName,
                    middle_name: middleName,
                    last_name: lastName,
                    contact_number: contactNumber,
                    district: district
                };

                // Send AJAX request
                $.ajax({
                    type: "POST",
                    url: "./backend/save_customer.php",
                    data: data,
                    success: function(response) {
                        if (response === "success") {
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Customer has been registered",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 1500);
                        } else {
                            Swal.fire({
                                position: "top-end",
                                icon: "error",
                                title: "An error occurred",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    },
                    error: function(error) {
                        console.error(error);
                        // Handle error (e.g., show error message, log, etc.)
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>