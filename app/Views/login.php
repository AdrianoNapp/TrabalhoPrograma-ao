<!DOCTYPE html>

<html>

<head>
    <title>Login</title>
</head>

<body>
<?php
if(session()->getFlashdata('mensagem')) 
    echo session()->getFlashdata('mensagem');
    ?>
    <h1>Login</h1>
    <form action="<?= base_url('login') ?>" method="post">

        <label for="username">Username ou Email</label>
        <input type="text" name="username" id="username"><br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password"><br>

        <button type="submit">Login</button>
    </form>

</body>

</html>
