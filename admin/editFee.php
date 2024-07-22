<?php
require './partials/header.php';

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $connection->prepare("SELECT feeStatus, amountPaid FROM `allstudent` WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();
    $stmt->close();
} else {
    die("No student ID provided");
}
?>

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
            <form action="<?= ROOT_URL ?>admin/editFeeLogic.php" method="post" id="loginForm">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="text" name="feeStatus" value="<?php echo htmlspecialchars($student['feeStatus']); ?>" placeholder="Payment status">
                <input type="text" name="amountPaid" value="<?php echo htmlspecialchars($student['amountPaid']); ?>" placeholder="Amount paid">
                <button type="submit" class="btn">Update Fee</button>
            </form>
        </div>
    </section>
</body>
</html>
