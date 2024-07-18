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
            <h2>Edit Teachers</h2>
            <form action="">
                <input type="text" placeholder="Staff Number">
                <input type="text" placeholder="Name"> 
                <input type="text" placeholder="Email">
                <input type="text" placeholder="Number">
                <select name="role" id="role" required>
                    <option value="">-- Edit Role --</option>
                    <option value="hm">H.M</option>
                    <option value="author">Author</option>
                    <option value="teacher">Teacher</option>
                    <option value="admin">Admin</option>
                </select>

                <button type="submit" class="btn">Update Staff</button>
            </form>
        </div>
    </section>
</body>
</html>
