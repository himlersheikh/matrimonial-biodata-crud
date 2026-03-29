<?php
session_start();
require_once 'db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM biodata WHERE id = :id");
$stmt->execute([':id' => $id]);
$record = $stmt->fetch();

if (!$record) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST['full_name']);
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $religion = trim($_POST['religion']);
    $education = trim($_POST['education']);
    $occupation = trim($_POST['occupation']);
    $height_cm = (int)$_POST['height_cm'];
    $contact_email = trim($_POST['contact_email']);
    $contact_phone = trim($_POST['contact_phone']);
    $address = trim($_POST['address']);

    $sql = "UPDATE biodata SET 
            full_name = :full_name, 
            gender = :gender, 
            dob = :dob, 
            religion = :religion, 
            education = :education, 
            occupation = :occupation, 
            height_cm = :height_cm, 
            contact_email = :contact_email, 
            contact_phone = :contact_phone, 
            address = :address
            WHERE id = :id";

    $update_stmt = $pdo->prepare($sql);
    $result = $update_stmt->execute([
        ':full_name' => $full_name,
        ':gender' => $gender,
        ':dob' => $dob,
        ':religion' => $religion,
        ':education' => $education,
        ':occupation' => $occupation,
        ':height_cm' => $height_cm,
        ':contact_email' => $contact_email,
        ':contact_phone' => $contact_phone,
        ':address' => $address,
        ':id' => $id
    ]);

    if ($result) {
        $_SESSION['message'] = "Biodata profile updated successfully!";
        $_SESSION['msg_type'] = "success";
        header("Location: index.php");
        exit();
    } else {
        $error = "Something went wrong. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Biodata</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Biodata</h1>
        
        <?php if(isset($error)): ?>
            <div class="alert error">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <form action="edit.php?id=<?= $id ?>" method="POST">
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" required value="<?= htmlspecialchars($record['full_name']) ?>">
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="Male" <?= $record['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                    <option value="Female" <?= $record['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                    <option value="Other" <?= $record['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required value="<?= htmlspecialchars($record['dob']) ?>">
            </div>

            <div class="form-group">
                <label for="religion">Religion/Caste</label>
                <input type="text" id="religion" name="religion" required value="<?= htmlspecialchars($record['religion']) ?>">
            </div>

            <div class="form-group">
                <label for="height_cm">Height (in cm)</label>
                <input type="number" id="height_cm" name="height_cm" required value="<?= htmlspecialchars($record['height_cm']) ?>">
            </div>

            <div class="form-group">
                <label for="education">Highest Education</label>
                <input type="text" id="education" name="education" required value="<?= htmlspecialchars($record['education']) ?>">
            </div>

            <div class="form-group full-width">
                <label for="occupation">Current Occupation</label>
                <input type="text" id="occupation" name="occupation" required value="<?= htmlspecialchars($record['occupation']) ?>">
            </div>

            <div class="form-group">
                <label for="contact_email">Email Address</label>
                <input type="email" id="contact_email" name="contact_email" required value="<?= htmlspecialchars($record['contact_email']) ?>">
            </div>

            <div class="form-group">
                <label for="contact_phone">Phone Number</label>
                <input type="text" id="contact_phone" name="contact_phone" required value="<?= htmlspecialchars($record['contact_phone']) ?>">
            </div>

            <div class="form-group full-width">
                <label for="address">Full Address</label>
                <textarea id="address" name="address" rows="3" required><?= htmlspecialchars($record['address']) ?></textarea>
            </div>

            <div class="form-actions">
                <a href="index.php" class="btn btn-danger" style="background: rgba(255, 255, 255, 0.1); box-shadow: none;">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Biodata</button>
            </div>
        </form>
    </div>
</body>
</html>
