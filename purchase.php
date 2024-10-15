<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Record Purchase</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
  <div class="container mt-5">
    <h1 class="text-center mb-4">Record a Purchase</h1>

    <?php
    $db = new SQLite3('db/database.sqlite');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $stmt = $db->prepare('INSERT INTO purchases (supplier_name, supplier_pan, product_detail, product_grouping, units_of_product, product_qty, converted_unit, product_type, product_rate, non_taxable_amount, taxable_amount, vat, total_amount, purchase_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

      $stmt->bindValue(1, $_POST['supplier_name'], SQLITE3_TEXT);
      $stmt->bindValue(2, $_POST['supplier_pan'], SQLITE3_TEXT);
      $stmt->bindValue(3, $_POST['product_detail'], SQLITE3_TEXT);
      $stmt->bindValue(4, $_POST['product_grouping'], SQLITE3_TEXT);
      $stmt->bindValue(5, $_POST['units_of_product'], SQLITE3_TEXT);
      $stmt->bindValue(6, $_POST['product_qty'], SQLITE3_FLOAT);
      $stmt->bindValue(7, $_POST['converted_unit'], SQLITE3_TEXT);
      $stmt->bindValue(8, $_POST['product_type'], SQLITE3_TEXT);
      $stmt->bindValue(9, $_POST['product_rate'], SQLITE3_FLOAT);
      $stmt->bindValue(10, $_POST['non_taxable_amount'], SQLITE3_FLOAT);
      $stmt->bindValue(11, $_POST['taxable_amount'], SQLITE3_FLOAT);
      $stmt->bindValue(12, $_POST['vat'], SQLITE3_FLOAT);
      $stmt->bindValue(13, $_POST['total_amount'], SQLITE3_FLOAT);
      $stmt->bindValue(14, $_POST['purchase_date'], SQLITE3_TEXT);

      if ($stmt->execute()) {
        echo "<div class='alert alert-success text-center'>Purchase recorded successfully!</div>";
      } else {
        echo "<div class='alert alert-danger text-center'>Error recording purchase: " . $db->lastErrorMsg() . "</div>";
      }
    }
    ?>

    <div class="row form-container">
    <form method="POST" class="row g-3">
    <div class="col-md-6">
        <div class="form-group">
            <label for="supplier_name" class="form-label">Supplier Name</label>
            <input type="text" class="form-control" id="supplier_name" name="supplier_name" placeholder="Enter Supplier Name" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="supplier_pan" class="form-label">Supplier PAN</label>
            <input type="text" class="form-control" id="supplier_pan" name="supplier_pan" placeholder="Enter Supplier PAN" required>
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
            <label for="units_of_product" class="form-label">Units of Product</label>
            <input type="text" class="form-control" id="units_of_product" name="units_of_product" placeholder="Enter Units" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="product_qty" class="form-label">Product Quantity</label>
            <input type="number" class="form-control" id="product_qty" name="product_qty" placeholder="Enter Quantity" step="0.01" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="converted_unit" class="form-label">Converted Unit (Optional)</label>
            <input type="text" class="form-control" id="converted_unit" name="converted_unit" placeholder="Enter Converted Unit">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="product_type" class="form-label">Product Type</label>
            <input type="text" class="form-control" id="product_type" name="product_type" placeholder="Enter Product Type" required>
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
            <label for="non_taxable_amount" class="form-label">Non-Taxable Amount</label>
            <input type="number" class="form-control" id="non_taxable_amount" name="non_taxable_amount" placeholder="Enter Non-Taxable Amount" step="0.01" required>
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
    <div class="col-md-6">
        <div class="form-group">
            <label for="purchase_date" class="form-label">Purchase Date</label>
            <input type="date" class="form-control" id="purchase_date" name="purchase_date" required>
        </div>
    </div>
    <div class="col-12 text-center mt-4">
        <button type="submit" class="btn btn-primary">Record Purchase</button>
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