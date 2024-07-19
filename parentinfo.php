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
    <form action="<?= ROOT_URL ?>parentFormLogic.php" method="POST">
      <div class="form">

        <div class="inputfield">
          <label>Father's Name</label>
          <input type="text" class="input" id="name" name="fname" placeholder="Enter first name" value="<?= htmlspecialchars($Father) ?>" maxlength="30"
            title="Enter only alphabets" required>
        </div>

        <div class="inputfield">
          <label>Mother's Name</label>
          <input type="text" class="input" id="name" name="lname" placeholder="Enter last name" maxlength="30"
            value="<?= htmlspecialchars($Mother) ?>" title="Enter only alphabets" required>
        </div>
        
        <div class="inputfield">
          <label for="">Father's Phone Number</label>
          <div class="custom-select" id="phone-codes">
            <select id="phone-code" name="father-phone-code">
              <option value="+234">+234</option>
            </select>
          </div>
          <input type="tel" class="input" name="father-phone-number" maxlength="10" id="phone-number"
            placeholder="Enter your phone number" value="<?= htmlspecialchars($FatherNumber) ?>" title="Please enter valid phone number">
        </div> 

        <div class="inputfield">
          <label for="">Mother's Phone Number</label>
          <div class="custom-select" id="phone-codes">
            <select id="phone-code" name="mother-phone-code">
              <option value="+234">+234</option>
            </select>
          </div>
          <input type="tel" class="input" name="mother-phone-number" maxlength="10" id="phone-number"
            placeholder="Enter your phone number" value="<?= htmlspecialchars($MothersNumber) ?>" title="Please enter valid phone number">
        </div> 

        <div class="inputfield">
          <label>Email Address</label>
          <input type="email" class="input" name="email" placeholder="Enter your email (optional)"
          value="<?= htmlspecialchars($Email) ?>" required>
        </div>

        <div class="inputfield">
          <label>Nationality</label>
          <input type="text" onkeyup='check()' class="input" id="confirm-password" name="nationality"
            placeholder="Nationality" autocomplete="off" "
            maxlength="100" minlength="8" required>
        </div>

        <div class="inputfield" id="religion">
            <label for="">Religion</label>
            <input type="radio" name="religion" id="radio" value="Male" <?= $Religion == 'Male' ? 'checked' : '' ?>> Male
            <input type="radio" name="religion" id="radio" value="Female" <?= $Religion == 'Female' ? 'checked' : '' ?>> Female
        </div>

        <div class="inputfield">
          <label>Address 1</label>
          <textarea class="textarea" name="address" id="" cols="30" rows="5" placeholder="Enter your address"
            maxlength="100" required><?= htmlspecialchars($Address) ?></textarea>
        </div>
        
        <div class="inputfield">
          <label>Address 2</label>
          <textarea class="textarea" name="address2" id="" cols="30" rows="5" placeholder="Enter your address"
            maxlength="100" required></textarea>
        </div>

        <div class="inputfield">
          <label>State</label>
          <div class="custom_select">
            <select id="state" name="state" required>
              <option value="">--Select your state--</option>
              <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
              <!-- Add other states as needed -->
            </select>
          </div>
        </div>

        <div class="inputfield btns" id="btn">
          <button type="submit" value="Register" class="btn">Next</button>
        </div>

      </div>
    </form>
  </div>
<script src="./assets/js/admission.js"></script>
<script src="../js/main.js"></script>
</body>

</html>
