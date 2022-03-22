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

$query = $pdo->prepare('SELECT * FROM users');

$query->execute();

$users = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<table style="font-size: 40px;">
    <tbody>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td><?php echo $user['id'] ?></td>
                <td><?php echo $user['first_name'] ?></td>
                <td><?php echo $user['last_name'] ?></td>
                <td>
                    <?php echo implode(', ', json_decode($user['hobbies'], true)) ?>
                </td>
                <td>
                    <form action="delete.php" method="post">
                        <input name="id" type="hidden" value="<?php echo $user['id'] ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<form action="save.php" method="post">
    <input name="id" type="hidden" value="<?php echo $users[0]['id'] ?>">
    <input name="first_name" type="text" value="<?php echo $users[0]['first_name'] ?>">
    <button type="submit">Update</button>
</form>