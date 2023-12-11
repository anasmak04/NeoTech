<?php

require "../controller/ShowController.php";
$show = new ShowController();
$products = [];
$products = $show->getProducts();
session_start();

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
<?php

if(isset($_SESSION["role"])){
    if($_SESSION["role"] === 1){
        ?>

<a href="./add.php"> Add Product</a>

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

                <a href="delete.php?id=<?= $row["id"] ?>">delete</a>
                <a href="Edit.php?id=<?= $row["id"] ?>">edit</a>

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

