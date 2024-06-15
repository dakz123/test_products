<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo isset($product) ? 'Edit' : 'Add'; ?> Product</title>
</head>

<body>
    <h2><?php echo isset($product) ? 'Edit' : 'Add'; ?> Product</h2>
    <form action="../controllers/ProductController.php?action=add_edit" method="post">
        <input type="hidden" name="id" value="<?php echo isset($product) ? $product['id'] : ''; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"
            value="<?php echo isset($product) ? htmlspecialchars($product['name']) : ''; ?>" required><br><br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price"
            value="<?php echo isset($product) ? htmlspecialchars($product['price']) : ''; ?>" required><br><br>
        <input type="submit" value="<?php echo isset($product) ? 'Update' : 'Add'; ?>">
    </form>
</body>

</html>