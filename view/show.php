<?php

require "../controller/ShowController.php";

$show = new ShowController();
$products = [];
$products = $show->getProducts();


?>


<table>
    <tr>
        <th>name</th>
        <th>description</th>
        <th>price</th>
    </tr>

    <?php
    if (!empty($products)) {
    while($row = $products->fetch_assoc()){

            ?>
            <tr>
                <td><?= $row["name"]; ?></td>
                <td><?=  $row["description"]; ?></td>
                <td><?= $row["price"]; ?></td>
            </tr>
            <?php
        }
    } else {
        echo "No data";
    }
    ?>
</table>

