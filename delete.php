<?php

$pdo = new PDO('pgsql:host=localhost;port=5432;dbname=products', 'postgres', 'Mandisa28');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM product_crud WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: index.php');
