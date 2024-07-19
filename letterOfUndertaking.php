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
    <div class="title">Letter Of Undertaking
    </div>
    <form action="POST" data-netlify="true">
      <div class="form">


      

        <div class="inputfield" required>
          <div data-netlify-recaptcha="true"></div>
        </div>
        <div class="inputfield terms">
            <label class="check">
              <input type="checkbox" name="check" value="Declared" required>
              <span class="checkmark"></span>
            </label>
            <p>I ${parent/guariden} of ${student's name}hereby stat that i will adhere to the schools rules and regulations:</p>
          </div>
  
          <div class="inputfield" required>
            <div data-netlify-recaptcha="true"></div>
          </div>

          <div class="inputfield" required>
            <div data-netlify-recaptcha="true"></div>
          </div>
          <div class="inputfield terms">
              <label class="check">
                <input type="checkbox" name="check" value="Declared" required>
                <span class="checkmark"></span>
              </label>
              <p>I ${father's name} ${Mothers's name} hereby declare that the  information provided is true and correct and to notify the school is the above information changes</p>
            </div>
    
            <div class="inputfield" required>
              <div data-netlify-recaptcha="true"></div>
            </div>
            <div class="inputfield">
                <label>Signature</label><p id="file-size">*Max size 100kb.</p>
                <input type="file" name="myfile" id="myfile" placeholder="Upload your photo" rows="7" required />
                
              </div>

        <div class="inputfield btns" id="btn">
          <button type="submit" value="Register" class="btn" onclick="checkPassword()">Payment</button>
        </div>
        

      </div>
    </form>
  </div>
<script src="./assets/js/admission.js"></script>
</body>

</html>