<?php 
require './partials/header.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Post</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    background-color: #fff;
    padding: 20px 30px;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;
}

h1 {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-top: 10px;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 10px 10px;
    resize: none;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="file"] {
    margin-bottom: 10px;
}

input[type="checkbox"] {
    margin-right: 5px;
}

button {
    padding: 10px 15px;
    background-color: #28a745;
    border: none;
    border-radius: 4px;
    color: #fff;
    cursor: pointer;
    width: 100%;
}

button:hover {
    background-color: #218838;
}

    </style>
    <div class="container">
        <h1>Create a Post</h1>
        <form action="/submit-post" method="post" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="body">Body:</label>
            <textarea id="body" name="body" rows="10" required></textarea>

            <label for="file">Picture:</label>
            <input type="file" id="file" name="file" accept="image/*" required>

            <label for="featured">
                <input type="checkbox" id="featured" name="featured">
                Feature this post
            </label>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
