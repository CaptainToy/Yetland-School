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
            <h2>Edit Student</h2>
            <form action="">
                <input type="text" name="fullname" placeholder="Student ID" required>
                <select name="role" id="role" required>
                    <option value="">--Gender--</option>
                    <option value="hm">Male</option>
                    <option value="author">Female</option>
                </select>
                <input type="text" name="First Name" placeholder="Full-Name" required>
                <input type="text" name="email" placeholder="Middle Name" required>
                <input type="text" name="number" placeholder="Last Name" required>
                <select name="role" id="role" required>
                    <option value="">-- Class --</option>
                    <option value="hm">Basic 1</option>
                    <option value="author">Basic 2</option>
                    <option value="teacher">Basic 3</option>
                    <option value="admin">Basic 4</option>
                </select>
                

                <button type="submit" class="btn">Edit Student</button>
            </form>
        </div>
    </section>
</body>
</html>
