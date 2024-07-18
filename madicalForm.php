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
    <div class="title">Medical Registration Form
    </div>
    <form action="POST" data-netlify="true">
      <div class="form">

        <div class="inputfield">
          <label>Blood Group</label>
          <input type="text" class="input" id="name" name="fname" placeholder="Blood Group" maxlength="30"
            pattern="[A-Za-z]{1,32}" title="Enter only alphabets" required>
        </div>

        <div class="inputfield">
          <label>Any peculiar medical condition</label>
          <input type="text" class="input" id="name" name="lname" placeholder="Medical condition" maxlength="30"
            pattern="[A-Za-z]{1,32}" title="Enter only alphabets" required>
        </div>

        <div class="inputfield" id="gender">
          <label for="">Immunization</label>
          <input type="radio" name="gender" id="radio" value="Male">Yes
          <input type="radio" name="gender" id="radio" value="Female">No
        </div>

     

        

    
  

        

        <p id="message"></p>

        <div class="inputfield">
          <label for="">Emergency Contact </label>
          <div class="custom-select" id="phone-codes">
            <select id="phone-code">
              <option value="+234">+234</option>
            </select>
          </div>
          <input type="tel" class="input" name="phone-number" maxlength="10" id="phone-number"
            placeholder="Enter your phone number" pattern="[7-9]{1}[0-9]{9}" title="Please enter valid phone number">
        </div>

       
        <div class="inputfield">
          <label>Medical condition report
            (Optional)</label><p id="file-size">*Max size 100kb.</p>
          <input type="file" name="myfile" id="myfile" placeholder="Upload your photo" rows="7" required />
          
        </div>

      

        <div class="inputfield" required>
          <div data-netlify-recaptcha="true"></div>
        </div>
        <div class="inputfield terms">
            <label class="check">
              <input type="checkbox" name="check" value="Declared" required>
              <span class="checkmark"></span>
            </label>
            <p>I hereby declare that the above information provided is true and correct and to notify the school is the above information changes</p>
          </div>
  
          <div class="inputfield" required>
            <div data-netlify-recaptcha="true"></div>
          </div>

        <div class="inputfield btns" id="btn">
          <button type="submit" value="Register" class="btn"><a href="./letterOfUndertaking.php">Next</a></button>
        </div>
        

      </div>
    </form>
  </div>
<script src="./assets/js/admission.js"></script>
</body>

</html>