<?php
include "C:/xampp/htdocs/adevamac/db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `products` WHERE `ID` = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: index.php?msg=Record deleted successfully");
        exit;
    } else {
        header("Location: index.php?msg=Failed to delete record");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>
