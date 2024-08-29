<?php
include "C:/xampp/htdocs/adevamac/db.php";

if (isset($_POST["submit"])) {
    $name = $_POST['Name'];
    $description = $_POST['Description'];
    $price = $_POST['Price'];
    $quantity = $_POST['Quantity'];

    $sql = "INSERT INTO `products` (`Name`, `Description`, `Price`, `Quantity`, `Create_at`, `Update_at`) VALUES (?, ?, ?, ?, NOW(), NOW())";
    $stmt = $db->prepare($sql);
    try {
        $stmt->execute([$name, $description, $price, $quantity]);
        header("Location: index.php?msg=New record created successfully");
        exit;
    } catch (PDOException $e) {
        echo "Failed: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>
<body>

<h3>Add</h3>


<form action="" method="post">
    <label>Name:</label>
    <input type="text" name="Name" placeholder="" required>
    <br>
    <label>Description:</label>
    <input type="text" name="Description" placeholder="" required>
    <br>
    <label>Price:</label>
    <input type="text" name="Price" placeholder="" required>
    <br>
    <label>Quantity:</label>
    <input type="text" name="Quantity" placeholder="" required>
    <br>
    <button type="submit" name="submit">Add</button>
    <a href="index.php">Cancel</a>
</form>


</body>
</html>
