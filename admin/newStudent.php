<?php 
require './partials/header.php';

// Ensure session is started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Assuming $id is set somewhere before this point, for example from a GET or POST request.
$id = $_GET['id'] ?? null; // Example, adjust as needed

// Prepare the SQL statement to prevent SQL injection
$stmt = $connection->prepare("SELECT * FROM studentapplication WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="./css/main.css">

        <title>New Student</title>
    </head>
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>

        
        </header>

        <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav__logo">
                    <i class='bx bx-layer nav__logo-icon'></i>
                    <span class="nav__logo-name">Yetland's Admin</span>
                </a>
                <div class="nav__list">
                    <a href="./Teacher.php" class="nav__link ">
                        <i class='bx bx-user nav__icon'></i>
                        <span class="nav__name">Teachers</span>
                    </a>
                    <a href="./allStudent.php" class="nav__link ">
                        <i class='bx bx-message-square-detail nav__icon'></i>
                        <span class="nav__name">Student</span>
                    </a>
                    <a href="./All-Result.php" class="nav__link">
                        <i class='bx bx-bookmark nav__icon'></i>
                        <span class="nav__name">Result</span>
                    </a>
                    <a href="./Add-post.php" class="nav__link">
                        <i class='bx bx-folder nav__icon'></i>
                        <span class="nav__name">Post</span>
                    </a>
                    <a href="./School-fee.php" class="nav__link">
                        <i class='bx bx-bar-chart-alt-2 nav__icon'></i>
                        <span class="nav__name">School Fee</span>
                    </a>
                    <a href="./newStudent.php" class="nav__link active">
                        <i class='bx bx-save nav__icon' ></i>
                        <span class="nav__name">New Student</span>
                        </a>
                </div>
            </div>
            <a href="../login.php" class="nav__link">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
        </div>

        <h2>New Student</h2>
        <h2 style="background-color: greenyellow; color:white; border: 1px solid black; padding:10px 15px; width: 90px; border-radius: 20px;"><a href='./parentformNext.php'>Next</a></h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <!-- <th>Date of Birth</th> -->
                    <th>Address</th>
                    <th>Picture</th>


                </tr>
            </thead>
            <tbody>
            <?php
$query = "SELECT id, Firstname, Lastname, Gender, Age, DOB, Address, Picture FROM studentapplication";
$stmt = $connection->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = htmlspecialchars($row['id']);
        $Firstname = htmlspecialchars($row['Firstname']);
        $Lastname = htmlspecialchars($row['Lastname']);
        $Gender = ($row['Gender'] == 0) ? 'Male' : 'Female';
        $Age = htmlspecialchars($row['Age']);
        $Address = htmlspecialchars($row['Address']);
        $Picture = htmlspecialchars($row['Picture']);

        echo "<tr>
                <td>{$id}</td>
                <td>{$Firstname} {$Lastname}</td>
                <td>{$Gender}</td>
                <td>{$Age}</td>
                <td>{$Address}</td>
                <td><img src='{$Picture}' alt='Picture' style='max-width: 100px; max-height: 100px;'></td>
              </tr>";
    }
}else {
    echo "<tr><td colspan='7'><div style=\"display: flex; justify-content: center; align-items: center; height: 50vh; margin: 0; background-color: #f0f0f0;\">
    <div style=\"text-align: center; padding: 20px; border: 1px solid #ccc; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);\">
        <h1 style=\"font-size: 24px; color: #333;\">No Data Found</h1>
        <p style=\"font-size: 16px; color: #666;\">We couldn't find any data to display. Please check back later.</p>
    </div>
</div>
</td>
</tr>";
}
$stmt->close();
?>

            </tbody>
        </table>
        <!--===== MAIN JS =====-->
        <script src="./js/main.js"></script>
    </body>
</html>
