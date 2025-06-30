<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo']) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Messages - Online Book Borrowing System</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

    <!-- Custom CSS -->
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
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Online Book Borrowing System</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                        <img src="images/user.png" class="rounded-circle me-2" width="32" height="32">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="index.php">Your Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid" style="margin-top: 70px;">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar">
                <ul class="nav flex-column">
                    <li class="nav-item active"><a href="index.php"><i class="fa fa-home me-2"></i>Home</a></li>
                    <li class="nav-item"><a href="message.php"><i class="fa fa-envelope me-2"></i>Messages</a></li>
                    <li class="nav-item"><a href="book.php"><i class="fa fa-book me-2"></i>All Books</a></li>
                    <!--<a href="history.php"><i class="fas fa-clock-rotate-left me-2"></i> Previously Borrowed Books</a>-->
                    <li class="nav-item"><a href="recommendations.php"><i class="fa fa-lightbulb me-2"></i>Recommendations</a></li>
                    <li class="nav-item"><a href="current.php"><i class="fa fa-clock me-2"></i>Currently Issued</a></li>
                    <li class="nav-item"><a href="logout.php"><i class="fa fa-sign-out-alt me-2"></i>Logout</a></li>
                </ul>
            </div>

            <!-- Messages Table -->
            <div class="col-md-9">
                <div class="table-container mt-3">
                    <h4 class="mb-4">Messages</h4>
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $rollno = $_SESSION['RollNo'];
                            $sql = "SELECT * FROM LMS.message WHERE RollNo='$rollno' ORDER BY Date DESC, Time DESC";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>{$row['Msg']}</td>
                                    <td>{$row['Date']}</td>
                                    <td>{$row['Time']}</td>
                                </tr>";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; 2025 Online Book Borrowing System. All rights reserved.
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php } else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>
