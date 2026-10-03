<!DOCTYPE html>
<html>
<head>
    <title>User Accounts</title>
</head>
<body>

<nav>
    <a href="/">Home</a> |
    <a href="/about">About</a> |
    <a href="/customers">Customers</a> |
    <a href="/users">Users</a>
    <a href="/logout">Logout</a>
</nav>

<h1>User Accounts</h1>

<?php if (session()->getFlashdata('success')): ?>
    <p style="color: green;">
        <?= esc(session()->getFlashdata('success')) ?>
    </p>
<?php endif; ?>

<p>
    <a href="/users/new">Add New User</a>
</p>

<table border="1" cellpadding="10">
    <tr>
        <th>Avatar</th>
        <th>Username</th>
        <th>Full Name</th>
        <th>Action</th>
    </tr>

    <?php foreach ($users as $user): ?>

        <tr>
            <td>
                <?php if (!empty($user['avatar'])): ?>

                    <img
                        src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>"
                        alt="Avatar"
                        width="80"
                        height="80"
                    >

                <?php else: ?>

                    <img
                        src="<?= base_url('images/placeholder.png') ?>"
                        alt="No Avatar"
                        width="80"
                        height="80"
                    >

                <?php endif; ?>
            </td>

            <td><?= esc($user['username']) ?></td>
            <td><?= esc($user['full_name']) ?></td>

            <td>
                <a href="/users/edit/<?= $user['id'] ?>">
                    Edit
                </a>
            </td>
        </tr>

    <?php endforeach; ?>

</table>

</body>
</html>