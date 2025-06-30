<?php
require('dbconn.php');

if (!isset($_SESSION['RollNo'])) {
    echo "<script>alert('Access Denied!!!'); window.location.href='login.php';</script>";
    exit();
}

$rollno = $_SESSION['RollNo'];
$searchTerm = '';
if (isset($_POST['submit'])) {
    $searchTerm = trim($_POST['title']);
    $sql = "SELECT * FROM LMS.record 
            JOIN LMS.book ON book.Bookid = record.BookId
            WHERE RollNo = ? 
              AND Date_of_Issue IS NOT NULL 
              AND Date_of_Return IS NULL
              AND (record.BookId = ? OR Title LIKE ?)";
    $stmt = $conn->prepare($sql);
    $likeTerm = '%' . $searchTerm . '%';
    $stmt->bind_param("iss", $rollno, $searchTerm, $likeTerm);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT * FROM LMS.record 
            JOIN LMS.book ON book.Bookid = record.BookId
            WHERE RollNo = ? 
              AND Date_of_Issue IS NOT NULL 
              AND Date_of_Return IS NULL";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $rollno);
    $stmt->execute();
    $result = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Online Book Borrowing System</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
<style>
    body {
        background: #f0f2f5;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .sidebar {
        min-height: 100vh;
        background-color: #343a40;
    }
    .sidebar .nav-link {
        color: #adb5bd;
        font-weight: 500;
    }
    .navbar-brand {
        font-weight: 700;
        color: #343a40 !important;
    }
    .table thead th {
        background-color: #343a40;
        color: #fff;
    }
     .footer {
            padding: 15px 0;
            text-align: center;
            background-color: #ecf0f1;
            color: #555;
            font-size: 14px;
            margin-top: 30px;
        }
</style>
</head>
<body>
<nav class="navbar navbar-light bg-white shadow-sm fixed-top">
    <a class="navbar-brand ml-3" href="index.php">Online Book Borrowing System</a>
    <div class="dropdown mr-3">
        <a href="#" class="d-flex align-items-center text-dark dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="images/user.png" alt="User" width="32" height="32" class="rounded-circle mr-2">
            <span>User</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="index.php">Your Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
    </div>
</nav>

<div class="container-fluid" style="padding-top:70px;">
    <div class="row no-gutters">
        <nav class="col-md-2 sidebar py-4 px-3">
            <nav class="nav flex-column">
                <a class="nav-link active" href="index.php"><i class="fas fa-home mr-2"></i>Home</a>
                <a class="nav-link" href="message.php"><i class="fas fa-inbox mr-2"></i>Messages</a>
                <a class="nav-link" href="book.php"><i class="fas fa-book mr-2"></i>All Books</a>
              <!-- <a class="nav-link"  href="history.php"><i class="fas fa-clock mr-2"></i>Previously Borrowed Book</a>-->
                <a class="nav-link" href="recommendations.php"><i class="fas fa-thumbs-up mr-2"></i>Recommend Books</a>
                <a class="nav-link" href="current.php"><i class="fas fa-list mr-2"></i>Currently Issued Books</a>
                <a class="nav-link mt-3" href="logout.php"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
            </nav>
        </nav>
        <main class="col-md-10 px-4">
            <h3 class="mt-4 mb-3 text-primary">Currently Issued Books</h3>

            <form method="post" action="current.php" class="form-inline mb-4">
                <input type="text" name="title" class="form-control mr-2 flex-grow-1" placeholder="Enter Book Name or Book ID" value="<?php echo htmlspecialchars($searchTerm); ?>" required>
                <button type="submit" name="submit" class="btn btn-primary">Search</button>
            </form>

            <?php if ($result->num_rows === 0): ?>
                <div class="alert alert-info text-center">No Results Found</div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Book ID</th>
                                <th>Book Name</th>
                                <th>Issue Date</th>
                                <th>Due Date</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()):
                                $bookid = htmlspecialchars($row['BookId']);
                                $name = htmlspecialchars($row['Title']);
                                $issuedate = htmlspecialchars($row['Date_of_Issue']);
                                $duedate = htmlspecialchars($row['Due_Date']);
                                $renewals = (int)$row['Renewals_left'];
                            ?>
                            <tr>
                                <td><?php echo $bookid; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $issuedate; ?></td>
                                <td><?php echo $duedate; ?></td>
                                <td class="text-center">
                                    <?php if ($renewals > 0): ?>
                                        <a href="renew_request.php?id=<?php echo $bookid; ?>" class="btn btn-success btn-sm mr-1">Renew</a>
                                    <?php endif; ?>
                                    <a href="return_request.php?id=<?php echo $bookid; ?>" class="btn btn-danger btn-sm">Return</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </main>
    </div>
</div>
<footer class="footer">
        <div class="container">
            &copy; 2025 Online Book Borrowing System. All rights reserved.
        </div>
    </footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
