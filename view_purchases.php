<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Purchase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    /* Custom styles for form styling */
    .form-container {
      background-color: #f0f8ff;  /* Light blue background */
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-label {
      margin-bottom: 0.5rem;  /* Increase label-input spacing */
    }
    .btn-record {  /* Custom styles for submit button */
      background-color: #4caf50; /* Green color */
      color: white;
      border-color: #4caf50;
      border-radius: 5px;
      padding: 0.75rem 1.5rem;
    }
  </style>
</head>
<body>
    <?php
        // Include the header file
        include('header.php');

        // Your existing PHP code for recording purchases...
    ?>
    <div class="container">
        <h1>Purchase Records</h1>

        <?php
        $db = new SQLite3('db/database.sqlite');
        $result = $db->query('SELECT * FROM purchases');

        echo "<table border='1'>";
        echo "<tr><th>Bill No</th><th>Supplier Name</th><th>Supplier PAN</th><th>Product Detail</th><th>Product Grouping</th><th>Units of Product</th><th>Product Qty</th><th>Converted Unit</th><th>Product Type</th><th>Product Rate</th><th>Non-Taxable Amount</th><th>Taxable Amount</th><th>VAT</th><th>Total Amount</th><th>Date</th></tr>";
        
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['bill_no'] . "</td>";
            echo "<td>" . $row['supplier_name'] . "</td>";
            echo "<td>" . $row['supplier_pan'] . "</td>";
            echo "<td>" . $row['product_detail'] . "</td>";
            echo "<td>" . $row['product_grouping'] . "</td>";
            echo "<td>" . $row['units_of_product'] . "</td>";
            echo "<td>" . $row['product_qty'] . "</td>";
            echo "<td>" . $row['converted_unit'] . "</td>";
            echo "<td>" . $row['product_type'] . "</td>";
            echo "<td>" . $row['product_rate'] . "</td>";
            echo "<td>" . $row['non_taxable_amount'] . "</td>";
            echo "<td>" . $row['taxable_amount'] . "</td>";
            echo "<td>" . $row['vat'] . "</td>";
            echo "<td>" . $row['total_amount'] . "</td>";
            echo "<td>" . $row['purchase_date'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>

        <br>
        <a href="index.php" class="btn">Back to Home</a>
    </div>
</body>
</html>
