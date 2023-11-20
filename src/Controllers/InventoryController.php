<?php

require_once __DIR__ . '/../Service/InventoryService.php';

class InventoryController {
    private InventoryService $inventoryService;
    public function __construct() {
        $this->inventoryService = new InventoryService(); 
    }

    public function index()
    {
        $inventory = $this->inventoryService->getAll();
        return View::renderView('inventory', ['inventory' => $inventory]);
    }

    public function create()
    {
        $id_inventory = $_POST['id_inventory'];
        $id_detail = $_POST['id_detail'];
        $name = $_POST['name'];
        $stock = $_POST['stock'];
        $inventory = new Inventory();
        $inventory->setIdInventory($id_inventory);
        $inventory->setIdDetail($id_detail);
        $inventory->setName($name);
        $inventory->setStock($stock);

        $this->inventoryService->create($inventory);
        return View::redirect('/inventory');
    }

    public function createForm()
    {
        return View::renderView('inventory/create');
    }

    public function update()
    {
        $id_inventory = $_POST['id_inventory'];
        $id_detail = $_POST['id_detail'];
        $name = $_POST['name'];
        $stock = $_POST['stock'];
        
        $inventory = new Inventory();
        $inventory->setIdInventory($id_inventory);
        $inventory->setIdDetail($id_detail);
        $inventory->setName($name);
        $inventory->setStock($stock);
        $this->inventoryService->update($inventory);
        return View::redirect('/inventory');
    }

    public function updateForm()
    {
        $id = $_GET['id'];

        $inventory = $this->inventoryService->getById($id);
    
        return View::renderView('inventory/update', ['inventory' => $inventory]);
    }

    public function delete()
    {
        $id_inventory = $_REQUEST['id'];
        var_dump($id_inventory);
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $this->inventoryService->delete($id_inventory);
        }
        
        return View::redirect('/inventory');
    }

    public function getByName()
    {
        $name = $_GET['name'];
        $inventory = $this->inventoryService->getByName($name);
        return View::renderView('inventory', ['inventory' => $inventory]);
    }

    public function getById()
    {
        $id_inventory = $_GET['id'];
        $inventory = $this->inventoryService->getById($id_inventory);
        return View::renderView('inventory', ['inventory' => $inventory]);
    }

}