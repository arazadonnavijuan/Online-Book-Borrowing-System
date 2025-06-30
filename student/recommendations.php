<?php
require('dbconn.php');

if (!isset($_SESSION['RollNo'])) {
    echo "<script>alert('Access Denied!!!'); window.location='login.php';</script>";
    exit;
}

if (isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['Description']);
    $rollno = $_SESSION['RollNo'];

    $stmt = $conn->prepare("INSERT INTO LMS.recommendations (Book_Name, Description, RollNo) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $description, $rollno);

    if ($stmt->execute()) {
        echo "<script>alert('Recommendation submitted successfully!');</script>";
    } else {
        echo "<script>alert('Error submitting recommendation. Please try again.');</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Online Book Borrowing System - Recommend a Book</title>

    <!-- Bootstrap 4 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f6f9;
            padding-top: 56px; /* Height of fixed navbar */
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
            height: calc(100vh - 56px); /* Full height minus navbar height */
            padding: 1.5rem 1rem;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.05);
            position: fixed;
            top: 56px;
            left: 0;
            overflow-y: auto;
            width: 220px;
            transition: all 0.3s ease;
            z-index: 1030; /* above main content */
        }

        .sidebar a {
            color: #333;
            font-weight: 500;
            text-decoration: none;
            display: block;
            padding: 12px 10px;
            border-radius: 8px;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }


        /* Content area to the right of sidebar */
        main.content-area {
            margin-left: 220px;
            padding: 2rem 1.5rem;
            min-height: calc(100vh - 56px);
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
        }

        footer {
            padding: 1rem 0;
            background-color: #343a40;
            color: white;
            text-align: center;
            margin-top: 2rem;
        }

        /* Mobile adjustments */
        @media (max-width: 767.98px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                box-shadow: none;
                padding: 1rem 0.5rem;
                margin-bottom: 1rem;
            }

            main.content-area {
                margin-left: 0;
                padding: 1rem;
                box-shadow: none;
                border-radius: 0;
            }

            body {
                padding-top: 56px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <a class="navbar-brand" href="index.php"></i> Online Book Borrowing System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarUserMenu" aria-controls="navbarUserMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarUserMenu">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="images/user.png" alt="User Avatar" class="rounded-circle" style="width:32px; height:32px; object-fit:cover;">
                        <span class="ml-2">Account</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="index.php">Your Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="sidebar d-none d-md-block">
                <div class="nav flex-column">
                    <a class="nav-link active" href="index.php"><i class="fas fa-home"></i> Home</a>
                    <a class="nav-link" href="message.php"><i class="fas fa-inbox"></i> Messages</a>
                    <a class="nav-link" href="book.php"><i class="fas fa-book"></i> All Books</a>
                    <!--<a href="history.php"><i class="fas fa-clock me-2"></i> Previously Borrowed Books</a>-->
                    <a class="nav-link" href="recommendations.php"><i class="fas fa-lightbulb"></i> Recommend Books</a>
                    <a class="nav-link" href="current.php"><i class="fas fa-book-reader"></i> Currently Issued Books</a>
                    <a class="nav-link text-danger mt-3" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </nav>

            <!-- Content Area -->
            <main role="main" class="content-area col-12 col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="mb-4">Recommend a Book</h2>
                <form action="recommendations.php" method="post" novalidate>
                    <div class="form-group">
                        <label for="title">Book Title <span class="text-danger">*</span></label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Enter book title" required>
                    </div>
                    <div class="form-group">
                        <label for="Description">Description <span class="text-danger">*</span></label>
                        <textarea id="Description" name="Description" rows="3" class="form-control" placeholder="Enter book description" required></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit Recommendation</button>
                </form>
            </main>
        </div>
    </div>

    <footer>
        &copy; 2025 Online Book Borrowing System. All rights reserved.
    </footer>

    <!-- JS (Bootstrap 4 and dependencies) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" ></script>
</body>

</html>
