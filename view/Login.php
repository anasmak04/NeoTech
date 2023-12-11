<?php
?>





<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
<h2>Login Authentication</h2>
<form action="../controller/LoginController.php" method="post">
    <input type="text" name="username" placeholder="username" />
    <input type="password" name="password" placeholder="password" />
    <button name="submit">save</button>
</form>

</body>
</html>