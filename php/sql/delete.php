<?php

try {
    $pdo = new PDO(
        'mysql:host=127.0.0.1;dbname=nerdify_course',
        'root',
        'root'
    );
} catch (\PDOException $e) {
    die('Could not connect');
}

$id = $_POST['id'];

$query = $pdo->prepare(
    'DELETE FROM users WHERE id = :id'
);

$query->execute(['id' => $id]);

header('Location: /');
die;