<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<nav>
    <a href="/">Home</a> |
    <a href="/about">About</a> |
    <a href="/customers">Customers</a> |
    <a href="/users">Users</a>
    <a href="/logout">Logout</a>
</nav>

<h1>Edit User</h1>

<?php if (isset($validation)): ?>
    <div style="color: red;">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<?php if (!empty($user['avatar'])): ?>
    <p>Current Avatar:</p>

    <img
        src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>"
        alt="Current Avatar"
        width="120"
        height="120"
    >
<?php endif; ?>

<form
    action="/users/update/<?= $user['id'] ?>"
    method="post"
    enctype="multipart/form-data"
>

    <?= csrf_field() ?>

    <p>
        <label>Username:</label><br>
        <input
            type="text"
            name="username"
            value="<?= esc(old('username', $user['username'])) ?>"
        >
    </p>

    <p>
        <label>Full Name:</label><br>
        <input
            type="text"
            name="full_name"
            value="<?= esc(old('full_name', $user['full_name'])) ?>"
        >
    </p>

    <p>
        <label>Profile Picture:</label><br>
        <input
            type="file"
            name="avatar"
            accept=".jpg,.jpeg,.png"
        >
    </p>

    <p>
        JPG or PNG only. Maximum size: 2 MB.
    </p>

    <button type="submit">Update User</button>

</form>

<p>
    <a href="/users">Back to Users</a>
</p>

</body>
</html>