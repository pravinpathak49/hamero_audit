<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record Sale</title>
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
        <h1>Sales Records</h1>

        <?php
        $db = new SQLite3('db/database.sqlite');
        $result = $db->query('SELECT * FROM sales');

        echo "<table border='1'>";
        echo "<tr><th>Bill No</th><th>Bill Date</th><th>Customer Name</th><th>Customer PAN</th><th>Product Detail</th><th>Product Grouping</th><th>Product Qty</th><th>Product Rate</th><th>Taxable Amount</th><th>Non-Taxable Amount</th><th>VAT</th><th>Total Amount</th></tr>";
        
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['bill_no'] . "</td>";
            echo "<td>" . $row['bill_date'] . "</td>";
            echo "<td>" . $row['customer_name'] . "</td>";
            echo "<td>" . $row['customer_pan'] . "</td>";
            echo "<td>" . $row['product_detail'] . "</td>";
            echo "<td>" . $row['product_grouping'] . "</td>";
            echo "<td>" . $row['product_qty'] . "</td>";
            echo "<td>" . $row['product_rate'] . "</td>";
            echo "<td>" . $row['taxable_amount'] . "</td>";
            echo "<td>" . $row['non_taxable_amount'] . "</td>";
            echo "<td>" . $row['vat'] . "</td>";
            echo "<td>" . $row['total_amount'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>

        <br>
        <a href="index.php" class="btn">Back to Home</a>
    </div>
</body>
</html>
