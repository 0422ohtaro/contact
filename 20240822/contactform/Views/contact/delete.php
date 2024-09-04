<?php
// Assuming you have a PDO instance $pdo

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM inquiries WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}

header('Location: /contact');
exit;
?>
