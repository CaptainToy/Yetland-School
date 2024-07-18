<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/css/edit.css">
    <title>Add Staff</title>
</head>
<body class="back">
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Add Result</h2>
            <form action="">
                <select name="role" id="role" required>
                    <option value="">-- Secssion --</option>
                    <option value="">2023/2024</option>
                    <option value="hm">2024</option>
                    <option value="author">2024/2025</option>
                </select>
                <select name="role" id="role" required>
                    <option value="">-- Term --</option>
                    <option value="">1st</option>
                    <option value="hm">2nd</option>
                    <option value="author">3rd</option>
                </select>
                
                <select name="role" id="role" required>
                    <option value="">-- Class --</option>
                    <option value="">Prep</option>
                    <option value="hm">KG 1</option>
                    <option value="author">Basic 1</option>
                </select>
                <select name="role" id="role" required>
                    <option value="">-- Subject --</option>
                    <option value="hm">Mathematics</option>
                    <option value="author">English Language</option>
                </select>
                <select name="role" id="role" required>
                    <option value="">-- School Id --</option>
                    <option value="hm">YMS-100-001</option>
                    <option value="author">YME-100-002</option>
                </select>
                <input type="text" placeholder="Name">

                <input type="text" name="First Name" placeholder="CA" required>
                <input type="text" name="email" placeholder="Exam" required>
               
                

                <button type="submit" class="btn">Update Result</button>
            </form>
        </div>
    </section>
</body>
</html>
