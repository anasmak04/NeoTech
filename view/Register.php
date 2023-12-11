<?php
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="../public/css/styles.css">
    </head>
    <body>
    <h2>Register Authentication</h2>

    <form action="../controller/RegisterController.php" method="post">
        <input type="text" name="username" placeholder="username" />
        <input type="text" name="fullname" placeholder="fullname" />
        <input type="password" name="password" placeholder="password" />
        <input type="password" name="confirmPwd" placeholder="confirmPwd" />
        <button name="submit">save</button>

    </body>
    </html>
