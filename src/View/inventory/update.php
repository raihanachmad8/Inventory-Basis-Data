<!-- edit_inventory_form.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Inventory Item</title>
</head>
<body>
    <h2>Edit Inventory Item</h2>
    <form action="/inventory/update" method="post">
        <input type="hidden" name="id_inventory" value="<?= $model['inventory']->getIdInventory(); ?>">
        
        <label for="id_detail">ID Detail:</label>
        <input type="text" id="id_detail" name="id_detail" value="<?= $model['inventory']->getIdDetail(); ?>" required>
        
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= $model['inventory']->getName(); ?>" required>
        
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" value="<?= $model['inventory']->getStock(); ?>" required>
        
        <button type="submit">Update Item</button>
    </form>
</body>
</html>
