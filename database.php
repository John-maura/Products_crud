<?php

$pdo = new PDO('pgsql:host=localhost;port=5432;dbname=products', 'postgres', 'Mandisa28');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $pdo;