<!DOCTYPE html>
<html>
<head>
    <title>Add</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>

    <h2>Add New Product</h2>

<form action="../controller/CreateController.php" method="post">
    <input type="text" name="name" placeholder="name" />
    <input type="text" name="description" placeholder="description" />
    <input type="number" name="price" placeholder="price" />
    <button name="submit">save</button>
</form>


</body>
</html>
