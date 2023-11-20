<h1>fasdjfsdkf</h1>

<a href="/inventory/create">Tambah Data</a>

<table>
    <thead>
        <tr>
            <td>Id</td>
            <td>Id_Detail</td>
            <td>Name</td>
            <td>Stock</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
<?php 

$inventory = $model['inventory'];

foreach($inventory as $inventory) {

    echo "<tr>";
    echo "<td>" . $inventory->getIdInventory() . "</td>";
    echo "<td>" . $inventory->getIdDetail() . "</td>";
    echo "<td>" . $inventory->getName() . "</td>";
    echo "<td>" . $inventory->getStock() . "</td>";
    echo "<td><button class='btn__update' data-id='{$inventory->getIdInventory()}'>Update</button></td>";
    echo "<td><button class='btn__delete' data-id='{$inventory->getIdInventory()}'>Delete</button></td>";
    echo "</tr>";
}

?>
</tbody>
</table>




<!-- Include this in the head section of your HTML document -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        

        const updateButtons = document.querySelectorAll('.btn__update');

        updateButtons.forEach(button => {
            button.addEventListener('click', function () {
                const itemId = button.dataset.id;
                // Handle the update action using fetch
                fetch(`/inventory/update?id=${itemId}`, {
                    method: 'GET',
                    // Add any other necessary fetch options
                })
                .then(response => {
                    // Handle the response as needed
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });

        // Get all delete buttons
        const deleteButtons = document.querySelectorAll('.btn__delete');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const itemId = button.dataset.id;
                // Handle the delete action using fetch
                fetch(`/inventory/delete?id=${itemId}`, {
                    method: 'DELETE',
                    // Add any other necessary fetch options
                })
                .then(response => {
                    // Handle the response as needed
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
    });
</script>
