<?php 
require './Config/constant.php';

// Initialize variables with null if not set
$Father = $_SESSION['signup-data']['Father'] ?? '';
$FatherNumber = $_SESSION['signup-data']['Father_Number'] ?? '';
$Mother = $_SESSION['signup-data']['Mother'] ?? '';
$MothersNumber = $_SESSION['signup-data']['Mothers_Number'] ?? '';
$Email = $_SESSION['signup-data']['Email'] ?? '';
$Religion = $_SESSION['signup-data']['Religion'] ?? '';
$Address = $_SESSION['signup-data']['Address'] ?? '';

// Clear signup-data session
unset($_SESSION['signup-data']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parent Registration Form</title>
  <link rel="stylesheet" href="./assets/css/admission.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-1ZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9s+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
  <div class="wrapper">
    <div class="title">Parent Registration Form</div>
    <form action="parentFormLogic.php" method="POST">
      <div class="form">

        <div class="inputfield">
          <label>Father's Name</label>
          <input type="text" class="input" id="name" name="Father" placeholder="Enter father's name" value="<?= htmlspecialchars($Father) ?>" maxlength="30"
            title="Enter only alphabets" required>
        </div>

        <div class="inputfield">
          <label>Mother's Name</label>
          <input type="text" class="input" id="name" name="Mother" placeholder="Enter mother's name" maxlength="30"
            value="<?= htmlspecialchars($Mother) ?>" title="Enter only alphabets" required>
        </div>
        
        <div class="inputfield">
          <label for="">Father's Phone Number</label>
          <input type="tel" class="input" name="FatherNumber" maxlength="10" id="phone-number"
            placeholder="Enter father's phone number" value="<?= htmlspecialchars($FatherNumber) ?>" title="Please enter valid phone number" required>
        </div> 

        <div class="inputfield">
          <label for="">Mother's Phone Number</label>
          <input type="tel" class="input" name="MothersNumber" maxlength="10" id="phone-number"
            placeholder="Enter mother's phone number" value="<?= htmlspecialchars($MothersNumber) ?>" title="Please enter valid phone number" required>
        </div> 

        <div class="inputfield">
          <label>Email Address</label>
          <input type="email" class="input" name="Email" placeholder="Enter your email (optional)"
          value="<?= htmlspecialchars($Email) ?>" required>
        </div>

        <div class="inputfield">
          <label>Religion</label>
          <input type="text" class="input" name="Religion" placeholder="Enter your religion"
            value="<?= htmlspecialchars($Religion) ?>" required>
        </div>

        <div class="inputfield">
          <label>Address</label>
          <textarea class="textarea" name="Address" id="" cols="30" rows="5" placeholder="Enter your address"
            maxlength="100" required><?= htmlspecialchars($Address) ?></textarea>
        </div>

        <div class="inputfield">
          <label>State</label>
          <div class="custom_select">
            <select id="state" name="State" required>
              <option value="">--Select your state--</option>
              <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
              <!-- Add other states as needed -->
            </select>
          </div>
        </div>

        <div class="inputfield btns" id="btn">
          <button type="submit" name="submit" value="Register" class="btn">Next</button>
        </div>

      </div>
    </form>
  </div>
<script src="./assets/js/admission.js"></script>
<script src="../js/main.js"></script>
</body>

</html>
