<?php

require "../controller/ShowController.php";

$show = new ShowController();
$products = [];
$products = $show->getProducts();


?>


<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h2>Product Table</h2>
<a href="./add.php"> Add Product</a>
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
    <td> <a href="delete.php?id=<?= $row["id"] ?>">delete</a>
        <a href="Edit.php?id=<?= $row["id"] ?>">edit</a></td>
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

