<?php require_once __DIR__.'/../partials/head.php' ?>

<table>
    <thead>
        <tr>
            <td>First name</td>
            <td>Last name</td>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user) { ?>
        <tr>
            <td><?php echo $user['first_name']; ?></td>
            <td><?php echo $user['last_name']; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?php require_once __DIR__.'/../partials/footer.php' ?>