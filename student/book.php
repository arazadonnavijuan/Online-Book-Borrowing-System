<?php
require('dbconn.php');

if (!isset($_SESSION['RollNo'])) {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books - Online Book Borrowing System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar .navbar-brand {
            color: #ffffff;
            font-weight: bold;
        }
        .navbar .nav-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }
        .sidebar {
            background-color: #ffffff;
            padding: 20px;
            border-right: 1px solid #dee2e6;
            height: 100vh;
        }
        .sidebar .nav-link {
            color: #343a40;
            font-weight: 500;
        }
        .sidebar .nav-link:hover {
            background-color: #e9ecef;
            border-radius: 5px;
        }
        .table th {
            background-color: #343a40;
            color: white;
        }
        .footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Online Book Borrowing System</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                        <img src="images/user.png" class="nav-avatar" alt="User">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="index.php">Your Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid" style="padding-top: 70px;">
        <div class="row">
            <div class="col-md-3 sidebar">
                <nav class="nav flex-column">
                    <a class="nav-link active" href="index.php"><i class="fas fa-home"></i> Home</a>
                    <a class="nav-link" href="message.php"><i class="fas fa-envelope"></i> Messages</a>
                    <a class="nav-link" href="book.php"><i class="fas fa-book"></i> All Books</a>
                   <!-- <a class="nav-link" href="history.php"><i class="fas fa-history"></i> Previously Borrowed Books</a>-->
                    <a class="nav-link" href="recommendations.php"><i class="fas fa-lightbulb"></i> Recommend Books</a>
                    <a class="nav-link" href="current.php"><i class="fas fa-list"></i> Currently Issued Books</a>
                    <a class="nav-link text-danger mt-4" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </nav>
            </div>

            <div class="col-md-9">
                <form class="form-inline my-4" action="book.php" method="post">
                    <label for="title" class="mr-2 font-weight-bold">Search:</label>
                    <input type="text" id="title" name="title" class="form-control mr-2 w-50" placeholder="Enter ID of Book" required>
                    <button type="submit" name="submit" class="btn btn-primary">Search</button>
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    $s = $_POST['title'];
                    $sql = "SELECT * FROM LMS.book WHERE BookId='$s' OR Title LIKE '%$s%'";
                } else {
                    $sql = "SELECT * FROM LMS.book ORDER BY Availability DESC";
                }

                $result = $conn->query($sql);
                $rowcount = mysqli_num_rows($result);

                if (!$rowcount) {
                    echo "<div class='alert alert-info text-center'>No Results Found</div>";
                } else {
                ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Book ID</th>
                                    <th>Book Name</th>
                                    <th>Availability</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    $bookid = $row['BookId'];
                                    $name = $row['Title'];
                                    $avail = $row['Availability'];
                                ?>
                                    <tr>
                                        <td><?php echo $bookid; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><span class="font-weight-bold text-<?php echo $avail > 0 ? 'success' : 'danger'; ?>"><?php echo $avail > 0 ? 'AVAILABLE' : 'NOT AVAILABLE'; ?></span></td>
                                        <td class="text-center">
                                            <a href="bookdetails.php?id=<?php echo $bookid; ?>" class="btn btn-info btn-sm">Details</a>
                                            <?php if ($avail > 0) echo "<a href='issue_request.php?id={$bookid}' class='btn btn-success btn-sm ml-2'>Issue</a>"; ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <footer class="footer mt-5">
        <div class="container">
            <p>&copy; 2025 Online Book Borrowing System. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>