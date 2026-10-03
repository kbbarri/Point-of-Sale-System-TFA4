<!DOCTYPE html>
<html>
<head>
    <title>New User</title>
</head>
<body>

<nav>
    <a href="/">Home</a> |
    <a href="/about">About</a> |
    <a href="/customers">Customers</a> |
    <a href="/users">Users</a>
    <a href="/logout">Logout</a>
</nav>

<h1>Add New User</h1>

<?php if (isset($validation)): ?>
    <div style="color: red;">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<form action="/users/create" method="post">

    <?= csrf_field() ?>

    <p>
        <label>Username:</label><br>
        <input
            type="text"
            name="username"
            value="<?= esc(old('username')) ?>"
        >
    </p>

    <p>
        <label>Full Name:</label><br>
        <input
            type="text"
            name="full_name"
            value="<?= esc(old('full_name')) ?>"
        >
    </p>

    <p>
        <label for="password">Password:</label><br>
        <input
            type="password"
            id="password"
            name="password"
        >
    </p>

    <button type="submit">Add User</button>

</form>

<p>
    <a href="/users">Back to Users</a>
</p>

</body>
</html>