<?php
session_start();
require_once 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $stmt = $pdo->prepare("DELETE FROM biodata WHERE id = :id");
    $result = $stmt->execute([':id' => $id]);
    
    if ($result) {
        $_SESSION['message'] = "Biodata profile deleted successfully!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Failed to delete profile.";
        $_SESSION['msg_type'] = "error";
    }
}

header("Location: index.php");
exit();
?>
