<!DOCTYPE html>
<html>
<head>
    <title>New Customer</title>
</head>
<body>

<nav>
    <a href="/">Home</a> |
    <a href="/about">About</a> |
    <a href="/customers">Customers</a> |
    <a href="/users">Users</a>
    <a href="/logout">Logout</a>
</nav>

<h1>Add New Customer</h1>

<?php if (isset($validation)): ?>
    <div style="color: red;">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<form action="/customers/create" method="post">

    <?= csrf_field() ?>

    <p>
        <label>Full Name:</label><br>
        <input
            type="text"
            name="full_name"
            value="<?= esc(old('full_name')) ?>"
        >
    </p>

    <p>
        <label>Email:</label><br>
        <input
            type="email"
            name="email"
            value="<?= esc(old('email')) ?>"
        >
    </p>

    <p>
        <label>Phone:</label><br>
        <input
            type="text"
            name="phone"
            value="<?= esc(old('phone')) ?>"
        >
    </p>

    <button type="submit">Add Customer</button>

</form>

<p>
    <a href="/customers">Back to Customers</a>
</p>

</body>
</html>