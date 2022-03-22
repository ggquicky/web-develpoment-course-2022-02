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
$firstName = $_POST['first_name'];

$query = $pdo->prepare(
    'UPDATE users SET first_name = :first_name WHERE id = :id'
);

$query->execute(
    [
        'first_name' => $firstName,
        'id' => $id,
    ]
);

header('Location: /');
die;
