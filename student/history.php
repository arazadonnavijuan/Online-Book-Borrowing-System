<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo']) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Previously Borrowed Books | Online Book Borrowing System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .sidebar {
            height: 100vh;
            background-color: #2c3e50;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            padding: 10px 20px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover, .sidebar .active > a {
            background-color: #1abc9c;
            color: white;
        }
        .card {
            margin-top: 30px;
        }
        .footer {
            background-color: #343a40;
            color: #ccc;
            text-align: center;
            padding: 10px 0;
            margin-top: 30px;
        }
        table thead {
            background-color: #1abc9c;
            color: white;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Online Book Borrowing System</a>
            <div class="d-flex">
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                        <img src="images/user.png" alt="user" width="32" height="32" class="rounded-circle me-2">
                        <strong>User</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="index.php">Your Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- SIDEBAR -->
            <div class="col-md-3 sidebar">
                <a href="index.php"><i class="fas fa-home"></i> Home</a>
                <a href="message.php"><i class="fas fa-envelope"></i> Messages</a>
                <a href="book.php"><i class="fas fa-book"></i> All Books</a>
                <a href="history.php" class="active"><i class="fas fa-history"></i> Previously Borrowed</a>
                <a href="recommendations.php"><i class="fas fa-lightbulb"></i> Recommend Books</a>
                <a href="current.php"><i class="fas fa-book-reader"></i> Currently Issued</a>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>

            <!-- MAIN CONTENT -->
            <div class="col-md-9">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4>Previously Borrowed Books</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" class="row g-3 mb-4">
                            <div class="col-md-9">
                                <input type="text" name="title" class="form-control" placeholder="Enter Book Name or ID" required>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" name="submit" class="btn btn-success w-100">Search</button>
                            </div>
                        </form>

                        <?php
                        $rollno = $_SESSION['RollNo'];
                        if (isset($_POST['submit'])) {
                            $s = $_POST['title'];
                            $sql = "SELECT * FROM LMS.record, LMS.book 
                                    WHERE RollNo = '$rollno' 
                                    AND Date_of_Issue IS NOT NULL 
                                    AND Date_of_Return IS NOT NULL 
                                    AND book.Bookid = record.BookId 
                                    AND (record.BookId = '$s' OR Title LIKE '%$s%')";
                        } else {
                            $sql = "SELECT * FROM LMS.record, LMS.book 
                                    WHERE RollNo = '$rollno' 
                                    AND Date_of_Issue IS NOT NULL 
                                    AND Date_of_Return IS NOT NULL 
                                    AND book.Bookid = record.BookId";
                        }

                        $result = $conn->query($sql);
                        $rowcount = mysqli_num_rows($result);

                        if (!$rowcount) {
                            echo "<div class='alert alert-warning text-center'>No Results Found</div>";
                        } else {
                        ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Book ID</th>
                                        <th>Book Name</th>
                                        <th>Issue Date</th>
                                        <th>Return Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $row['BookId']; ?></td>
                                        <td><?php echo $row['Title']; ?></td>
                                        <td><?php echo $row['Date_of_Issue']; ?></td>
                                        <td><?php echo $row['Date_of_Return']; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        <div class="container">
            &copy; 2025 Online Book Borrowing System. All rights reserved.
        </div>
    </div>

    <!-- JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
} else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
}
?>
