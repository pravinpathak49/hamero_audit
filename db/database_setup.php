<?php
// Create SQLite database and tables
$db = new SQLite3('db/database.sqlite');

// Create purchase table
$purchase_query = "
CREATE TABLE IF NOT EXISTS purchases (
    bill_no INTEGER PRIMARY KEY,
    supplier_name TEXT,
    supplier_pan TEXT,
    product_detail TEXT,
    product_grouping TEXT,
    units_of_product TEXT,
    product_qty REAL,
    converted_unit TEXT,
    product_type TEXT,
    product_rate REAL,
    non_taxable_amount REAL,
    taxable_amount REAL,
    vat REAL,
    total_amount REAL,
    purchase_date TEXT
);";
$db->exec($purchase_query);

// Create sales table
$sales_query = "
CREATE TABLE IF NOT EXISTS sales (
    bill_no INTEGER PRIMARY KEY,
    bill_date TEXT,
    customer_name TEXT,
    customer_pan TEXT,
    product_detail TEXT,
    product_grouping TEXT,
    product_qty REAL,
    product_rate REAL,
    taxable_amount REAL,
    non_taxable_amount REAL,
    vat REAL,
    total_amount REAL
);";
$db->exec($sales_query);

echo "Database and tables created successfully!";
?>
