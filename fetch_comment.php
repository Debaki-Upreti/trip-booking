<?php
include 'config.php';

$post_id = intval($_GET['post_id']); // Sanitize input

$stmt = $pdo->prepare("SELECT * FROM comments WHERE post_id = ? ORDER BY created_at DESC");
$stmt->execute([$post_id]);

$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($comments);
?>
