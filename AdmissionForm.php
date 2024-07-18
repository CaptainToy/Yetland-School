<?php 
require './Config/constant.php';

// Initialize variables with null if not set
$Firstname = $_SESSION['signup-data']['Firstname'] ?? '';
$Lastname = $_SESSION['signup-data']['Lastname'] ?? '';
$Gender = $_SESSION['signup-data']['Gender'] ?? '';
$Age = $_SESSION['signup-data']['Age'] ?? '';
$DOB = $_SESSION['signup-data']['DOB'] ?? '';
$Address = $_SESSION['signup-data']['Address'] ?? '';
$Picture = $_SESSION['signup-data']['Picture'] ?? '';

// Clear signup-data session
unset($_SESSION['signup-data']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration Form</title>
  <link rel="stylesheet" href="./assets/css/admission.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-1ZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9s+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
  <div class="wrapper">
    <div class="title">Student Registration Form</div>
    
    <?php if (isset($_SESSION['signup-error'])): ?>
    <div class="error-container">
      <h1 style="color:red;">Error</h1>
      <p style="color:red;"><?= htmlspecialchars($_SESSION['signup-error']) ?></p>
      <?php unset($_SESSION['signup-error']); ?>
    </div>
    <?php endif; ?>

    <form action="<?= htmlspecialchars(ROOT_URL . 'addmistionlogic.php') ?>" enctype="multipart/form-data" method="post">
      <div class="form">

        <div class="inputfield">
          <label>First Name</label>
          <input type="text" class="input" id="Firstname" value="<?= htmlspecialchars($Firstname) ?>" name="fname" placeholder="Enter first name" maxlength="30" title="Enter only alphabets" required>
        </div>

        <div class="inputfield">
          <label>Last Name</label>
          <input type="text" class="input" id="Lastname" value="<?= htmlspecialchars($Lastname) ?>" name="lname" placeholder="Enter last name" maxlength="30" title="Enter only alphabets" required>
        </div>

        <div class="inputfield" id="gender">
          <label for="">Gender</label>
          <input type="radio" name="gender" id="gender-male" value="Male" <?= ($Gender == 'Male') ? 'checked' : '' ?>>Male
          <input type="radio" name="gender" id="gender-female" value="Female" <?= ($Gender == 'Female') ? 'checked' : '' ?>>Female
        </div>

        <div class="inputfield">
          <label for="">Age</label>
          <input type="text" class="input" name="age" value="<?= htmlspecialchars($Age) ?>" placeholder="Enter your age" maxlength="2" pattern="^[0-9]{2}$" title="Enter numbers only" required>
        </div>

        <div class="inputfield">
          <label for="">Date of Birth</label>
          <input type="date" class="input" name="dob" value="<?= htmlspecialchars($DOB) ?>" required>
        </div>

        <div class="inputfield">
          <label>Address</label>
          <textarea class="textarea" name="address" cols="30" rows="5" placeholder="Enter your address" maxlength="100" required><?= htmlspecialchars($Address) ?></textarea>
        </div>

        <div class="inputfield">
          <label>Upload Photo</label>
          <p id="file-size">*Max size 100mb.</p>
          <input type="file" name="myfile" id="myfile" required>
        </div>

        <div class="inputfield btns" id="btn">
          <button type="submit" name="submit" value="Register" class="btn">Register</button>
        </div>

      </div>
    </form>
  </div>
  <script src="./assets/js/admission.js"></script>
</body>

</html>
