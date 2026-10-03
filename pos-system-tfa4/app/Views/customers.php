<!DOCTYPE html>
<html>
<head>
    <title>Customer Accounts</title>
</head>
<body>

<p>
    Logged in as:
    <strong><?= esc(session()->get('fullName')) ?></strong>
</p>

<nav>
    <a href="/">Home</a> |
    <a href="/about">About</a> |
    <a href="/customers">Customers</a> |
    <a href="/users">Users</a>
    <a href="/logout">Logout</a>
</nav>

<h1>Customer Accounts</h1>

<?php if (session()->getFlashdata('success')): ?>
    <p style="color: green;">
        <?= esc(session()->getFlashdata('success')) ?>
    </p>
<?php endif; ?>

<p>
    <a href="/customers/new">Add New Customer</a>
</p>

<table border="1" cellpadding="10">
    <tr>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>

    <?php foreach ($customers as $customer): ?>

        <tr>
            <td><?= esc($customer['full_name']) ?></td>
            <td><?= esc($customer['email']) ?></td>
            <td><?= esc($customer['phone']) ?></td>
            <td>
                <a href="/customers/edit/<?= $customer['id'] ?>">
                    Edit
                </a>
            </td>
        </tr>

    <?php endforeach; ?>

</table>

</body>
</html>