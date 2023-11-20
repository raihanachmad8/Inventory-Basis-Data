<?php

require_once __DIR__ . '/../Repository/InventoryRepository.php';

interface InventoryServiceInterface {
    public function getAll(): array;
    public function getById(string $id): ?Inventory;
    public function create(Inventory $inventory): void;
    public function update(Inventory $inventory): void;
    public function delete(string $id): void;
    public function getByName(string $name): ?Inventory;
}

class InventoryService implements InventoryServiceInterface {
    private InventoryRepository $inventoryRepository;
    public function __construct() {
        $this->inventoryRepository = new InventoryRepository(); 
    }

    public function getAll(): array
    {
        return $this->inventoryRepository->getAll();
    }

    public function getById(string $id): ?Inventory
    {
        return $this->inventoryRepository->getById($id);
    }

    public function create(Inventory $inventory): void
    {
        $this->inventoryRepository->create($inventory);
    }

    public function update(Inventory $inventory): void
    {
        $this->inventoryRepository->update($inventory);
    }

    public function delete(string $id): void
    {
        $this->inventoryRepository->delete($id);
    }

    public function getByName(string $name): ?Inventory
    {
        return $this->inventoryRepository->getByName($name);
    }


}