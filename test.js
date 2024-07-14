document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const email = document.getElementById('email').value;
    const pass = document.getElementById('pass').value;
    const error = document.getElementById('error');
    const email1 = "admin123, 123456, help123"
    const password = "123456, admin123, help"
    

    if (email === 'admin123' && pass === '123456') {
        alert(error.textContent = "Admin Correct");
        error.style.color = "green";
        window.location.href = './admin/Admin.html';
    } else if (email === 'help123' && pass === '123456') {
        error.textContent = "Welcome HM";
        error.style.color = "yellow";
        alert(error.textContent); // Added alert after setting the text content
        window.location.href = './HM/Admin.html';
    } else {
        error.textContent = "Welcome Staff";
        error.style.color = "red";
        alert(error.textContent); // Added alert after setting the text content
        window.location.href = './index.html';
    }
});

function handleAgreement(event) {
    event.preventDefault();
    var checkbox = document.querySelector('input[type="checkbox"]');
    if (checkbox.checked) {
        if (confirm("Are you sure you want to proceed?")) {
            window.location.href = './teacher.html';
        }
    } else {
        alert("You must agree to the terms and conditions before continuing.");
    }
}