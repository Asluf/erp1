<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Item </title>
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
                <th colspan="7" class="text-center"><h3>ITEM DETAILS</h3></th>
            </tr>
            <tr class="table-light">
                <th>Item ID</th>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Item Category</th>
                <th>Sub Category</th>
                <th>Quantity</th>
                <th>Unit Price</th>
            </tr>

            <?php
            include('./backend/conn.php');
            $sql = "SELECT * FROM item";
            $res = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr class='table-light'> 
                        <td class='table-light'>" . $row['id'] . "</td>
                        <td class='table-light'>" . $row['item_code'] . "</td>
                        <td class='table-light'>" . $row['item_name'] . "</td>
                        <td class='table-light'>" . $row['item_category'] . "</td>
                        <td class='table-light'>" . $row['item_subcategory'] . "</td>
                        <td class='table-light'>" . $row['quantity'] . "</td>
                        <td class='table-light'>" . $row['unit_price'] . "</td>
                    
                    </tr>";
            }
            ?>



        </table>
    </div>
    <div class="text-center">
        <button type="button" class="btn btn-primary" id="addItemBtn">Add New Item</button>
    </div>
    <!-- Form -->
    <div class="form-container" style="display: none;">
        <h3 class="text-center">Item Registration Form</h3>
        <form id="item-form">
            <label for="item_code">Item Code:</label>
            <input type="text" id="item_code" name="item_code"><br><br>
            <label for="item_name">Item Name:</label>
            <input type="text" id="item_name" name="item_name"><br><br>
            <label for="item_category">Item Category:</label>
            <select name="item_category" id="item_category">
                <option value="Select">Select</option>
                <?php
                $sql = "SELECT * FROM item_category";
                $res = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<option value=" . $row['id'] . ">" . $row['category'] . "</option>";
                }
                ?>

            </select><br><br>
            <label for="item_sub_category">Item Sub Category:</label>
            <select name="item_sub_category" id="item_sub_category">
                <option value="Select">Select</option>
                <?php
                $sql = "SELECT * FROM item_subcategory";
                $res = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<option value=" . $row['id'] . ">" . $row['sub_category'] . "</option>";
                }
                ?>
            </select><br><br>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity"><br><br>
            <label for="unit_price">Unit Price:</label>
            <input type="text" id="unit_price" name="unit_price"><br><br>
            <div class="text-center">
                <input type="submit" id="btn-submit" value="Save" />
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $("#addItemBtn").click(function() {
                $(".form-container").toggle();
            });
            $("#item-form").submit(function(e) {
                e.preventDefault();

                var itemCode = $("#item_code").val();
                var itemName = $("#item_name").val();
                var itemCategory = $("#item_category").val();
                var itemSubCategory = $("#item_sub_category").val();
                var quantity = $("#quantity").val();
                var unitPrice = $("#unit_price").val();

                if (!itemCode || !itemName || itemCategory === "Select" || itemSubCategory === "Select" || !quantity || !unitPrice) {
                    Swal.fire("Please fill in all fields.");
                    return;
                } else if (isNaN(quantity) || isNaN(parseFloat(unitPrice))) {
                    Swal.fire("Quantity should be a valid integer, and Unit Price should be a valid number.");
                    return;
                }

                // Create data object
                var data = {
                    item_code: itemCode,
                    item_category: itemCategory,
                    item_subcategory: itemSubCategory,
                    item_name: itemName,
                    quantity: quantity,
                    unit_price: unitPrice
                };

                // Send AJAX request
                $.ajax({
                    type: "POST",
                    url: "./backend/save_item.php",
                    data: data,
                    success: function(response) {
                        if (response == "success") {
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Item has been saved",
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