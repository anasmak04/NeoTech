<?php


require "../controller/ProductImplementation.php";

$show = new ProductImplementation();
$products = [];
$products = $show->findAll();
session_start();

?>



<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>

<h2>Product Table</h2>
<?php

if(isset($_SESSION["role"])){
    if($_SESSION["role"] === 1){
        ?>

<a class="add" href="./add.php"> Add Product</a>

<?php
    }
}

?>




<table/>
<tr>
    <th>Id</th>
    <th>Name</th>
    <th>Description</th>
    <th>Price</th>
    <th>Actions</th>

<tr>
    <?php
    if (!empty($products)) {
    while($row = $products->fetch_assoc()){

    ?>
    <td><?= $row["id"]; ?></td>
    <td><?= $row["name"]; ?></td>
    <td><?=  $row["description"]; ?></td>
    <td><?= $row["price"]; ?></td>
    <td>
        <?php

        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] === 1) {
                ?>

                <a href="delete.php?id=<?= $row["id"] ?>">Delete</a>
                <a href="Edit.php?id=<?= $row["id"] ?>">Edit</a>

                <?php
            }
        }
        ?>
    </td>
</tr>
<?php
}
} else {
    echo "No data";
}
?>

<table/>
</body>
</html>

