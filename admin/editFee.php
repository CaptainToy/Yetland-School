<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/edit.css">
    <title>Edit Fee</title>
</head>
<body class="back">
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Edit Fee</h2>
            <form action="">
                <select name="fee_status" id="fee_status">
                    <option value="paid">Fully paid</option>
                    <option value="half_paid">Half Paid</option>
                    <option value="not_paid">Debtor</option>
                </select>
                <input type="text" placeholder="Amount paid">
                <button type="submit" class="btn">Update Fee</button>
            </form>
        </div>
    </section>
</body>
</html>
