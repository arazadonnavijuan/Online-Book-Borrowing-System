<?php
require('dbconn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Index - Online Book Borrowing System</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f6f9;
        }
        .navbar {
            background-color: #2c3e50;
        }
        .navbar .navbar-brand {
            color: #fff;
            font-weight: 500;
        }
        .sidebar {
            background-color: #fff;
            height: 100vh;
            padding: 30px 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.05);
        }
        .sidebar a {
            color: #333;
            font-weight: 500;
            text-decoration: none;
            display: block;
            padding: 12px 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            transition: 0.3s ease;
        }
        .table-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 8px rgba(0,0,0,0.05);
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

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Online Book Borrowing System</a>
            <div class="dropdown ms-auto">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="images/user.png" alt="User" class="rounded-circle" width="40" height="40">
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow rounded-3 text-small" style="min-width: 180px;">
    <li>
        <a class="dropdown-item d-flex align-items-center gap-2" href="index.php">
            <i class="fas fa-user-circle text-primary"></i> Your Profile
        </a>
    </li>
    <li><hr class="dropdown-divider my-1"></li>
    <li>
        <a class="dropdown-item d-flex align-items-center gap-2 text-danger" href="logout.php">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </li>
</ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 sidebar">
                <a href="index.php"><i class="fas fa-home me-2"></i> Home</a>
                <a href="message.php"><i class="fas fa-envelope me-2"></i> Messages</a>
                <a href="book.php"><i class="fas fa-book me-2"></i> All Books</a>
               <!--<a href="history.php"><i class="fas fa-clock-rotate-left me-2"></i> Previously Borrowed Books</a>-->
                <a href="recommendations.php"><i class="fas fa-lightbulb me-2"></i> Recommendations</a>
                <a href="current.php"><i class="fas fa-book-reader me-2"></i> Currently Issued Books</a>
                <a href="logout.php"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 py-4">
                <div class="d-flex flex-column align-items-center">
                    <div class="card p-4" style="max-width: 600px; width: 100%;">
                        <div class="text-center">
                            <img src="images/profile2.png" class="profile-img mb-3" alt="Profile Image">
                        </div>

                        <?php
                        $rollno = $_SESSION['RollNo'];
                        $sql = "SELECT * FROM LMS.user WHERE RollNo = '$rollno'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();

                        $name = $row['Name'];
                        $category = $row['Category'];
                        $email = $row['EmailId'];
                        $mobno = $row['MobNo'];
                        ?>

                        <h3 class="text-center mb-3"><?php echo $name; ?></h3>
                        <p><strong>Email:</strong> <?php echo $email; ?></p>
                        <p><strong>Student ID:</strong> <?php echo $rollno; ?></p>
                        <p><strong>Category:</strong> <?php echo $category; ?></p>
                        <p><strong>Mobile:</strong> <?php echo $mobno; ?></p>

                        <div class="text-center mt-3">
                            <a href="edit_student_details.php" class="btn btn-primary">Edit Details</a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; 2025 Online Book Borrowing System. All rights reserved.
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
