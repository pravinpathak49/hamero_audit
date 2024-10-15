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
    <div class="container mt-5  form-container">
        <h1 class="text-center mb-4">Record a Sale</h1>

        <?php
        $db = new SQLite3('db/database.sqlite');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $db->prepare('INSERT INTO sales (bill_no, bill_date, customer_name, customer_pan, product_detail, product_grouping, product_qty, product_rate, taxable_amount, non_taxable_amount, vat, total_amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

            $stmt->bindValue(1, $_POST['bill_no'], SQLITE3_TEXT);
            $stmt->bindValue(2, $_POST['bill_date'], SQLITE3_TEXT);
            $stmt->bindValue(3, $_POST['customer_name'], SQLITE3_TEXT);
            $stmt->bindValue(4, $_POST['customer_pan'], SQLITE3_TEXT);
            $stmt->bindValue(5, $_POST['product_detail'], SQLITE3_TEXT);
            $stmt->bindValue(6, $_POST['product_grouping'], SQLITE3_TEXT);
            $stmt->bindValue(7, $_POST['product_qty'], SQLITE3_FLOAT);
            $stmt->bindValue(8, $_POST['product_rate'], SQLITE3_FLOAT);
            $stmt->bindValue(9, $_POST['taxable_amount'], SQLITE3_FLOAT);
            $stmt->bindValue(10, $_POST['non_taxable_amount'], SQLITE3_FLOAT);
            $stmt->bindValue(11, $_POST['vat'], SQLITE3_FLOAT);
            $stmt->bindValue(12, $_POST['total_amount'], SQLITE3_FLOAT);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success text-center'>Sale recorded successfully!</div>";
            } else {
                echo "<div class='alert alert-danger text-center'>Error recording sale: " . $db->lastErrorMsg() . "</div>";
            }
        }
        ?>

<form method="POST" class="row g-3">
    <div class="col-md-6">
        <div class="form-group">
            <label for="bill_no" class="form-label">Bill No</label>
            <input type="text" class="form-control" id="bill_no" name="bill_no" placeholder="Enter Bill No" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="bill_date" class="form-label">Bill Date</label>
            <input type="date" class="form-control" id="bill_date" name="bill_date" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="customer_name" class="form-label">Customer Name</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Enter Customer Name" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="customer_pan" class="form-label">Customer PAN</label>
            <input type="text" class="form-control" id="customer_pan" name="customer_pan" placeholder="Enter Customer PAN" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="product_detail" class="form-label">Product Detail</label>
            <input type="text" class="form-control" id="product_detail" name="product_detail" placeholder="Enter Product Detail" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="product_grouping" class="form-label">Product Grouping</label>
            <input type="text" class="form-control" id="product_grouping" name="product_grouping" placeholder="Enter Product Grouping" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="product_qty" class="form-label">Product Quantity</label>
            <input type="number" class="form-control" id="product_qty" name="product_qty" placeholder="Enter Product Quantity" step="0.01" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="product_rate" class="form-label">Product Rate</label>
            <input type="number" class="form-control" id="product_rate" name="product_rate" placeholder="Enter Product Rate" step="0.01" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="taxable_amount" class="form-label">Taxable Amount</label>
            <input type="number" class="form-control" id="taxable_amount" name="taxable_amount" placeholder="Enter Taxable Amount" step="0.01" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="non_taxable_amount" class="form-label">Non-Taxable Amount</label>
            <input type="number" class="form-control" id="non_taxable_amount" name="non_taxable_amount" placeholder="Enter Non-Taxable Amount" step="0.01" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="vat" class="form-label">VAT</label>
            <input type="number" class="form-control" id="vat" name="vat" placeholder="Enter VAT" step="0.01" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="total_amount" class="form-label">Total Amount</label>
            <input type="number" class="form-control" id="total_amount" name="total_amount" placeholder="Enter Total Amount" step="0.01" required>
        </div>
    </div>
    <div class="col-12 text-center mt-4">
        <button type="submit" class="btn btn-primary">Record Sale</button>
    </div>
</form>

        <br>
        <div class="text-center">
            <a href="index.php" class="btn btn-secondary">Back to Home</a>
        </div>
    </div>
    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
