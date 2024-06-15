<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product List</title>
</head>

<body>
    <h2>Product List</h2>
    <a href="../controllers/ProductController.php?action=add_edit">Add Product</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td><?php echo htmlspecialchars($product['price']); ?></td>
                    <td>
                        <a
                            href="../controllers/ProductController.php?action=add_edit&id=<?php echo $product['id']; ?>">Edit</a>
                        <a href="../controllers/ProductController.php?action=delete&id=<?php echo $product['id']; ?>"
                            onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>