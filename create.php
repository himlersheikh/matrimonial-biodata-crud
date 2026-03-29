<?php
session_start();
require_once 'db.php';

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

    $sql = "INSERT INTO biodata (full_name, gender, dob, religion, education, occupation, height_cm, contact_email, contact_phone, address)
            VALUES (:full_name, :gender, :dob, :religion, :education, :occupation, :height_cm, :contact_email, :contact_phone, :address)";

    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([
        ':full_name' => $full_name,
        ':gender' => $gender,
        ':dob' => $dob,
        ':religion' => $religion,
        ':education' => $education,
        ':occupation' => $occupation,
        ':height_cm' => $height_cm,
        ':contact_email' => $contact_email,
        ':contact_phone' => $contact_phone,
        ':address' => $address
    ]);

    if ($result) {
        $_SESSION['message'] = "Biodata profile created successfully!";
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
    <title>Add Biodata</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Add New Biodata</h1>
        
        <?php if(isset($error)): ?>
            <div class="alert error">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <form action="create.php" method="POST">
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" required placeholder="John Doe">
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="" disabled selected>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>
            </div>

            <div class="form-group">
                <label for="religion">Religion/Caste</label>
                <input type="text" id="religion" name="religion" required placeholder="e.g., Islam - Sunni">
            </div>

            <div class="form-group">
                <label for="height_cm">Height (in cm)</label>
                <input type="number" id="height_cm" name="height_cm" required placeholder="175">
            </div>

            <div class="form-group">
                <label for="education">Highest Education</label>
                <input type="text" id="education" name="education" required placeholder="B.Sc. in CSE">
            </div>

            <div class="form-group full-width">
                <label for="occupation">Current Occupation</label>
                <input type="text" id="occupation" name="occupation" required placeholder="Software Engineer">
            </div>

            <div class="form-group">
                <label for="contact_email">Email Address</label>
                <input type="email" id="contact_email" name="contact_email" required placeholder="johndoe@example.com">
            </div>

            <div class="form-group">
                <label for="contact_phone">Phone Number</label>
                <input type="text" id="contact_phone" name="contact_phone" required placeholder="+8801...">
            </div>

            <div class="form-group full-width">
                <label for="address">Full Address</label>
                <textarea id="address" name="address" rows="3" required placeholder="123 Street, City..."></textarea>
            </div>

            <div class="form-actions">
                <a href="index.php" class="btn btn-danger" style="background: rgba(255, 255, 255, 0.1); box-shadow: none;">Cancel</a>
                <button type="submit" class="btn btn-primary">Save Biodata</button>
            </div>
        </form>
    </div>
</body>
</html>
