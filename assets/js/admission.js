
  
  var uploadField = document.getElementById("myfile");
  
  uploadField.onchange = function() {
    if (this.files[0].size > 100000) {
      alert("File is too big! File size should be 100kb.");
      this.value = "";
    }
  };