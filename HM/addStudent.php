<?php 
require './Config/constant.php';

// session_start();

// Initialize variables with null if not set
$Firstname = $_SESSION['signup-data']['Firstname'] ?? '';
$Middlename = $_SESSION['signup-data']['Middlename'] ?? '';
$Lastname = $_SESSION['signup-data']['Lastname'] ?? '';
$Address = $_SESSION['signup-data']['Address'] ?? '';
$Gender = $_SESSION['signup-data']['Gender'] ?? '';
$Studentid = $_SESSION['signup-data']['StudentID'] ?? '';
$Class = $_SESSION['signup-data']['Class'] ?? '';

// Clear signup-data session
unset($_SESSION['signup-data']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../signUp.css">
    <title>Student Registration Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Student Registration Form</h2>
        <?php if (isset($_SESSION['signup-error'])): ?>
            <div class="error-container">
                <h1 style="color:red;"><?= htmlspecialchars($_SESSION['signup-error']) ?></h1>
            </div>
        <?php unset($_SESSION['signup-error']); endif; ?>
        
        <form action="<?= ROOT_URL ?>StudentLogic.php" method="post" enctype="multipart/form-data" id="loginForm">
            <div class="form-row">
                <div class="form-group">
                    <label for="first-name">First Name:</label>
                    <input type="text" id="first-name" name="Firstname" value="<?= htmlspecialchars($Firstname) ?>" required>
                </div>
                <div class="form-group">
                    <label for="middle-name">Middle Name:</label>
                    <input type="text" id="middle-name" name="Middlename" value="<?= htmlspecialchars($Middlename) ?>" required>
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name:</label>
                    <input type="text" id="last-name" name="Lastname" value="<?= htmlspecialchars($Lastname) ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea name="Address" id="address" placeholder="" style="resize:none;" rows="5"><?= htmlspecialchars($Address) ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="Gender" id="gender">
                    <option value="">***************</option>
                    <option value="Male" <?= $Gender == 'Male' ? 'selected' : '' ?>>Male</option>
                    <option value="Female" <?= $Gender == 'Female' ? 'selected' : '' ?>>Female</option>
                </select>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="student-id">Student Id:</label>
                    <input type="text" id="student-id" name="StudentID" value="<?= htmlspecialchars($Studentid) ?>" required>
                </div>
                <div class="form-group">
                    <label for="class">Class:</label>
                    <select name="Class" id="class">
                        <option value="">***************</option>
                        <option value="Pre" <?= $Class == 'Pre' ? 'selected' : '' ?>>Pre</option>
                        <option value="KG 1" <?= $Class == 'KG 1' ? 'selected' : '' ?>>KG 1</option>
                        <option value="KG 2" <?= $Class == 'KG 2' ? 'selected' : '' ?>>KG 2</option>
                        <option value="NUR 1" <?= $Class == 'NUR 1' ? 'selected' : '' ?>>NUR 1</option>
                        <option value="NUR 2" <?= $Class == 'NUR 2' ? 'selected' : '' ?>>NUR 2</option>
                        <option value="BASIC 1" <?= $Class == 'BASIC 1' ? 'selected' : '' ?>>BASIC 1</option>
                        <option value="BASIC 2" <?= $Class == 'BASIC 2' ? 'selected' : '' ?>>BASIC 2</option>
                        <option value="BASIC 3" <?= $Class == 'BASIC 3' ? 'selected' : '' ?>>BASIC 3</option>
                        <option value="BASIC 4" <?= $Class == 'BASIC 4' ? 'selected' : '' ?>>BASIC 4</option>
                        <option value="BASIC 5" <?= $Class == 'BASIC 5' ? 'selected' : '' ?>>BASIC 5</option>
                        <option value="BASIC 6" <?= $Class == 'BASIC 6' ? 'selected' : '' ?>>BASIC 6</option>
                    </select>
                </div>
            </div>
            <button type="submit" name="submit" class="btn">Sign Up</button>
        </form>
    </div>
</body>
</html>
