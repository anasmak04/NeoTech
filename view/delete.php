<?php

use controller\ProductImplementation;

require_once __DIR__ . "/../controller/ProductImplementation.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleteController = new ProductImplementation();
    $deleteController->deleteById($id);
    header("Location: show.php");
    exit();
} else {
    echo "No product ID specified for deletion.";
}
?>
