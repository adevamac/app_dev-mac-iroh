<?php
include "C:/xampp/htdocs/adevamac/db.php";

$sql = "SELECT * FROM `products`";
$stmt = $db->query($sql);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list</title>
</head>
<body>

<h3>List</h3>
<a href="insert.php">Add</a>

<?php if (isset($_GET['msg'])): ?>
    <p><?php echo htmlspecialchars($_GET['msg']); ?></p>
<?php endif; ?>

<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Created_At</th>
            <th>Updated_At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo htmlspecialchars($product['Name']); ?></td>
                <td><?php echo htmlspecialchars($product['Description']); ?></td>
                <td><?php echo htmlspecialchars($product['Price']); ?></td>
                <td><?php echo htmlspecialchars($product['Quantity']); ?></td>
                <td><?php echo htmlspecialchars($product['Create_at']); ?></td>
                <td><?php echo htmlspecialchars($product['Update_at']); ?></td>
                <td>
                    <a href="update.php?id=<?php echo $product['ID']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $product['ID']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
