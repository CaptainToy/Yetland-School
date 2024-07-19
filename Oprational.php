<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .preloader {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 9999;
        }
        .preloader.hidden {
            display: none;
        }
        .spinner {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .home-button {
            margin-top: 20px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .home-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="preloader">
        <div class="spinner"></div>
    </div>

    <div class="success-message" style="display: none;">
        <h1>Success!</h1>
        <p>Student Added Successfully</p>
        <button class="home-button" onclick="goHome()">Go Home</button>
    </div>

    <script>
        function goHome() {
            window.location.href = './AdmissionForm.php'; // Change this to your home page URL
        }

        window.onload = function() {
            setTimeout(function() {
                document.querySelector('.preloader').classList.add('hidden');
                document.querySelector('.success-message').style.display = 'block';
            }, 5000); // 10 seconds
        };
    </script>
</body>
</html>
