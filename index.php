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
        
        <h1>Welcome to Purchase & Sales Management System</h1>
        <div class="buttons">
            <a href="purchase.php" class="btn">Record Purchase</a>
            <a href="sales.php" class="btn">Record Sale</a>
            <a href="view_purchases.php" class="btn">View Purchases</a>
            <a href="view_sales.php" class="btn">View Sales</a>
        </div>
    </div>
</body>
</html>
