<?php 
require './partials/header.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/css/edit.css">
    <title>Edit Teachers</title>
</head>
<body class="back">
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Send Mail</h2>
            <form action="">
                <input type="text" placeholder="Form">
                <select name="role" id="role" required>
                    <option value="">-- Emails--</option>
                    <option value="hm">All</option>
                    <option value="author">korede.abdulsalam@gmail.com</option>

                    <option value="teacher">abdulsalamkorede64@gmail.com</option>
                </select>
                <textarea name="" id="" rows="10" placeholder="Body"></textarea>

                <button type="submit" class="btn">Send Mail</button>
            </form>
        </div>
    </section>
</body>
</html>
