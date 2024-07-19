<?php 
require './Config/constant.php';

// Initialize variables with null if not set

$BOG = $_SESSION['signup-data']['BOG'] ?? '';
$Condition = $_SESSION['signup-data']['Condition'] ?? '';
$Immun = $_SESSION['signup-data']['Immun'] ?? '';
$EmgContact = $_SESSION['signup-data']['EmgContact'] ?? '';
$MedPic = $_SESSION['signup-data']['MedPic'] ?? '';
$Consent = $_SESSION['signup-data']['Consent'] ?? '';

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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-1ZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9s+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
  <div class="wrapper">
    <div class="title">Medical Registration Form</div>
    <?php if (isset($_SESSION['signup-error'])): ?>
    <div class="error-container">
      <h1 style="color:red;">Error</h1>
      <p style="color:red;"><?= htmlspecialchars($_SESSION['signup-error']) ?></p>
      <?php unset($_SESSION['signup-error']); ?>
    </div>
    <?php endif; ?>
    <form action="<?= ROOT_URL ?>medicalFormLogic.php" method="post" id="loginForm" enctype="multipart/form-data">
    <div class="form">
      

        <div class="inputfield">
          <label>Blood Group</label>
          <input type="text" class="input" id="name" name="BOG" placeholder="Blood Group" maxlength="30"
           value="<?= htmlspecialchars($BOG) ?>" title="Enter only alphabets" required>
        </div>

        <div class="inputfield">
          <label>Any peculiar medical condition</label>
          <input type="text" class="input" id="condition" name="Condition" placeholder="Medical condition" maxlength="30"
           value="<?= htmlspecialchars($Condition) ?>" title="Enter only alphabets" required>
        </div>

        <div class="inputfield" id="gender">
          <label>Immunization</label>
          <input type="radio" name="Immun" id="radio-yes" value="Yes" <?= $Immun == 'Yes' ? 'checked' : '' ?>>Yes
          <input type="radio" name="Immun" id="radio-no" value="No" <?= $Immun == 'No' ? 'checked' : '' ?>>No
        </div>

        <p id="message"></p>

        <div class="inputfield">
          <label>Emergency Contact</label>
          <div class="custom-select" id="phone-codes">
            <select id="phone-code">
              <option value="+234">+234</option>
            </select>
          </div>
          <input type="tel" class="input" name="EmgContact" maxlength="10" id="phone-number"
            placeholder="Enter your phone number" value="<?= htmlspecialchars($EmgContact) ?>" title="Please enter valid phone number">
        </div>

        <div class="inputfield">
          <label>Medical condition report</label>
          <p id="file-size">*Max size 100kb.</p>
          <input type="file" name="MedPic" id="myfile" placeholder="Upload your photo" rows="7" required>
        </div>

        <div class="inputfield" required>
          <div data-netlify-recaptcha="true"></div>
        </div>
        
        <div class="inputfield terms">
          <label class="check">
            <input type="checkbox" name="Consent" value="1" <?= $Consent == 'yes' ? 'checked' : 'no' ?> required>
            <span class="checkmark"></span>
          </label>
          <p>I hereby declare that the above information provided is true and correct and to notify the school if the above information changes.</p>
        </div>

        <div class="inputfield btns" id="btn">
            <button type="submit" name="submit" value="Register" class="btn">Next</button>
        </div>
      </div>
    </form>
  </div>
  <script src="./assets/js/admission.js"></script>
</body>

</html>
