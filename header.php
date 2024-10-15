<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Navbar</title>
    <style>
        header {
            background-color: #8e44ad; /* Purple color */
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav li {
            margin: 0 10px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
        }

        nav a:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
    <header>
        <h1>Hamero Audit</h1>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="purchase.php">Record Purchase</a></li>
                <li><a href="sales.php">Record Sales</a></li>
                <li><a href="view_purchases.php">View Purchase</a></li>
                <li><a href="view_sales.php">View Sales</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        </main>
</body>
</html>