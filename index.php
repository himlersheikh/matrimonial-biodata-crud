<?php
session_start();
require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM biodata ORDER BY id DESC");
$records = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrimonial Biodata Database</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Matrimonial Biodata Portal</h1>
        
        <?php if(isset($_SESSION['message'])): ?>
            <div class="alert <?= $_SESSION['msg_type'] ?>">
                <?= $_SESSION['message'] ?>
            </div>
            <?php 
                unset($_SESSION['message']);
                unset($_SESSION['msg_type']);
            ?>
        <?php endif; ?>

        <div class="header-actions">
            <div>
                <h2>Biodata Directory</h2>
            </div>
            <a href="create.php" class="btn btn-primary">+ Add New Biodata</a>
        </div>

        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Religion</th>
                        <th>Education</th>
                        <th>Contact</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($records as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id']) ?></td>
                            <td><?= htmlspecialchars($row['full_name']) ?></td>
                            <td><?= htmlspecialchars($row['gender']) ?></td>
                            <td><?= htmlspecialchars($row['religion']) ?></td>
                            <td><?= htmlspecialchars($row['education']) ?></td>
                            <td><?= htmlspecialchars($row['contact_phone']) ?></td>
                            <td class="actions">
                                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-primary" style="padding: 0.4rem 0.8rem; font-size: 0.8rem;">Edit</a>
                                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger" style="padding: 0.4rem 0.8rem; font-size: 0.8rem;" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if(empty($records)): ?>
                        <tr>
                            <td colspan="7" style="text-align: center; color: #94a3b8; padding: 2rem;">No biodata records found. Click '+ Add New Biodata' to create one.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
