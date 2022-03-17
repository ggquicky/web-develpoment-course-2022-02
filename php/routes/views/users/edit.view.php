<h1>Editing user</h1>

<form action="/users/1/update" method="post">
    <input name="name" type="text" value="<?php echo $user['first_name'] ?>">
    <button type="submit">Update</button>
</form>
