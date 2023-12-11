<?php

require_once "../controller/DeleteController.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleteController = new DeleteController();
    $deleteController->DeleteProduct($id);
    header("Location: show.php");
    exit();
} else {
    echo "No product ID specified for deletion.";
}
?>
