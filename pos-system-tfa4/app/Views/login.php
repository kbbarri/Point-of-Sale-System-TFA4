<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS System Login</title>
</head>
<body>

    <h1>POS System Login</h1>

    <?php if (isset($validation)): ?>
        <div style="color: red;">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <?php if (isset($error)): ?>
        <p style="color: red;">
            <?= esc($error) ?>
        </p>
    <?php endif; ?>

    <form action="/login" method="post">

        <?= csrf_field() ?>

        <p>
            <label for="username">Username:</label><br>
            <input
                type="text"
                id="username"
                name="username"
                value="<?= esc(old('username')) ?>"
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

        <button type="submit">Login</button>

    </form>

</body>
</html>