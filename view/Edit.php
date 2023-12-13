<?php
require_once "../database/DbConfig.php";

if(isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM product WHERE id = ?";
    $db = new DbConfig();
    $stmt = $db->getConnection()->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            $name = $user['name'];
            $description = $user['description'];
            $price = $user['price'];
        } else {
            echo "User not found.";
            exit;
        }

    }

}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
<h1>Edit User</h1>
<form action="../controller/ProductImplementation.php" method="post">
    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="text" name="name" placeholder="Name" value="<?= $name ?>">
    <input type="text" name="description" placeholder="Description" value="<?= $description ?>">
    <input type="number" name="price" placeholder="Price" value="<?= $price ?>">
    <button type="submit" name="submit">Save</button>
</form>
</body>
</html>