<?php
require './partials/header.php';

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $connection->prepare("SELECT Code, Subject FROM `subject` WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $subject = $result->fetch_assoc();
    $stmt->close();
} else {
    die("No subject ID provided");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/css/edit.css">
    <title>Edit Subject</title>
</head>
<body class="back">
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Edit Subject</h2>
            <form action="<?= ROOT_URL ?>HM/editSubjectLogic.php" method="post">
                <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
                <input type="text" id="Code" name="Code" value="<?= htmlspecialchars($subject['Code']) ?>" placeholder="Code" required>
                <input type="text" id="Subject" name="Subject" value="<?= htmlspecialchars($subject['Subject']) ?>" placeholder="Subject" required>
                <button type="submit" name="submit" class="btn">Update Subject</button>
            </form>
        </div>
    </section>
</body>
</html>
