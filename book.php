<?php

require_once('config.php');

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id'):
$stmt->execute([''])

