<!-- inventory/create.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Inventory Item</title>
</head>
<body>
    <h2>Create New Inventory Item</h2>
    <form id="create-form" action="/inventory/create" method="post">
        <label for="id_inventory">ID Inventory:</label>
        <input type="text" id="id_inventory" name="id_inventory" required>
        
        <label for="id_detail">ID Detail:</label>
        <input type="text" id="id_detail" name="id_detail" required>
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" required>
        
        <button type="submit">Create Item</button>
    </form>
</body>
</html>
